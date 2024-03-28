<?php

return [
    'pattern' => 'shop/cart',
    'auth' => false,
    'method' => 'PATCH',
    'action'  => function () {
        $cart = cart();
        $key = $this->requestBody('id');
        $quantity = $this->requestBody('quantity', 1);
        $isShipping = $this->requestBody('isShipping', false);
        if (!$isShipping) {
            checkStock(page($key), $quantity);
        }
        $cart->updateItem(compact('key', 'quantity'));
        return $this->cart();
    },
];
