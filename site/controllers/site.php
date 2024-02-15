<?php

return function ($kirby) {
    if ($kirby->language()->code() == 'it') {
        $lang = 'it';
        $langCode = 'it_IT';
        $languageString = 'It';
        $href = '/';
    } else if ($kirby->language()->code() == 'en') {
        $lang = 'en';
        $langCode = 'en_US';
        $languageString = 'En';
        $href = 'en';
    }

    return [
        'lang' => $lang,
        'langCode' => $langCode,
        'languageString' => $languageString,
        'href' => $href,
    ];
};