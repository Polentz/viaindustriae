<?php

return function ($status = 'ok', $code = 200) {
    $cart = cart();

    $taxRates = array_map(function ($taxRate) {
        $taxRate['sum'] = formatPrice($taxRate['sum']);
        return $taxRate;
    }, $cart->getTaxRates());

    // new
    // $shippingCosts = array_map(function ($shippingCost) {
    //     $shippingCost['sum'] = formatPrice($shippingCost['sum']);
    //     return $shippingCost;
    // }, $cart->getShippingCosts());

    /*
      $items includes every product. Shipping is handle as a normal product.
      In this case we want to filter out the shipping item and return this separately.
    */
    $items = $cart->filter('template', '!=', 'shipping');

    // add up quantities of “real” products (everything but “shipping”)
    $quantity = 0.0;
    foreach ($items as $item) {
        $quantity += (float)$item['quantity'];
    }

    $items = $items->getFormattedItems();

    $items = array_map(function ($item) {
        $productPage = page($item['id']);
        $item['title'] = (string)$productPage->title();
        // add url of each cart item
        $item['url'] = (string)$productPage->url();
        // max amount is used to create the select element of each cart item.
        $item['maxAmount'] = $productPage->maxAmount();
        return $item;
    }, $items);

    // $shippings = $cart->filter('template', 'shipping');

    // $shippings = array_map(function ($shipping) {
    //     $shippingPage = page($item['id']);
    //     $shipping['title'] = (string)$shippingPage->title();
    // }, $shipping);
    /*
      Get shipping price.
      On line 15 we removed shipping items from the $items collection.
      Now we want to calculate the price by adding up the prices of shipping items.
      In most cases we might have only one shipping item, but in case we have multiple,
      this would be a save way to calculate shipping.
    */
    $shippingPrice = 0;
    $shippingId = '';
    foreach ($cart->filter('template', 'shipping') as $shippingItem) {
        $shippingPrice += $shippingItem['price'];
        $shippingId = $shippingItem['id'];
    }

    return [
        'status' => $status,
        'code' => $code,
        'data' => [
            'items' => $items,
            'shipping' => $shippingPrice === 0 ? formatPrice(0) : formatPrice($shippingPrice),
            'shippingId' => $shippingId,
            'sum' => formatPrice($cart->getSum()),
            'tax' => formatPrice($cart->getTax()),
            'taxRates' => $taxRates,
            'quantity' => $quantity,
            'checkoutUrl' => site()->checkoutPage()->url(),
        ],
    ];
};
