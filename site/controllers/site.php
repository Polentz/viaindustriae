<?php

return function ($kirby) {
    if ($kirby->language()->code() == 'it') {
        $lang = 'it';
        $langCode = 'it_IT';
    } else if ($kirby->language()->code() == 'en') {
        $lang = 'en';
        $langCode = 'en_US';
    }

    $languageStringIt = 'It';
    $languageStringEn = 'En';
    $hrefIt = '/';
    $hrefEn = 'en';

    return [
        'lang' => $lang,
        'langCode' => $langCode,
        'languageStringIt' => $languageStringIt,
        'languageStringEn' => $languageStringEn,
        'hrefIt' => $hrefIt,
        'hrefEn' => $hrefEn,
    ];
};