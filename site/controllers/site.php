<?php

return function ($kirby) {
    if ($kirby->language()->code() == 'it') {
        $languageString = 'It';
        $href = 'en';
    } else if ($kirby->language()->code() == 'en') {
        $languageString = 'En';
        $href = 'it';
    };

    return [
        'languageString' => $languageString,
        'href' => $href,
    ];
};