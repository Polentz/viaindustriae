<?php

return function ($kirby) {
    if ($kirby->language()->code() == 'it') {
        $lang = 'it';
        $langCode = 'it_IT';
        $languageString = 'It';
        $href = 'en';
        $cart = 'Carrello';
        $search = 'Cerca';
        $all = 'Tutti i libri';
        $buy = 'Compra';
    } else if ($kirby->language()->code() == 'en') {
        $lang = 'en';
        $langCode = 'en_US';
        $languageString = 'En';
        $href = 'it';
        $cart = 'Cart';
        $search = 'Search';
        $all = 'All books';
        $buy = 'Buy';
    }

    return [
        'lang' => $lang,
        'langCode' => $langCode,
        'languageString' => $languageString,
        'href' => $href,
        'cart' => $cart,
        'search' => $search,
        'all' => $all,
        'buy' => $buy
    ];
};