<?php

return function ($kirby) {
    if ($kirby->language()->code() == 'it') {
        $lang = 'it';
        $langCode = 'it_IT';
        $languageString = 'It';
        $href = 'en';
        $cart = 'Carrello';
        $search = 'Cerca';
        $buy = 'Compra';
    } else if ($kirby->language()->code() == 'en') {
        $lang = 'en';
        $langCode = 'en_US';
        $languageString = 'En';
        $href = '/';
        $cart = 'Cart';
        $search = 'Search';
        $buy = 'Buy';
    }

    return [
        'lang' => $lang,
        'langCode' => $langCode,
        'languageString' => $languageString,
        'href' => $href,
        'cart' => $cart,
        'search' => $search,
        'buy' => $buy
    ];
};