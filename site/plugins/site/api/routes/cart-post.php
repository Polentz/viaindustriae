<?php

return [
    'pattern' => 'shop/cart',
    'auth' => false,
    'method' => 'POST',
    'action'  => function () {
        $cart = cart();
        $key = $this->requestBody('id');
        $quantity = $this->requestBody('quantity', 1);
        $isShipping = $this->requestBody('isShipping', false);
        // if item (id) is already in cart, add up quantities.
        if ($cartItem = $cart->get($key)) {
            $quantity = $cartItem['quantity'] + $quantity;
        }
        if (!$isShipping) {
            checkStock(page($key), $quantity);
        }
        $cart->add($key, compact('quantity'));
        return $this->cart();
    },
];
