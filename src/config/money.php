<?php
return [
    'decimal' =>
        [
            'total' => 30,
            'places' => 10
        ],
    'formatters' => [
        'currency' => [
            'formatter' => \NumberFormatter::CURRENCY,
            'locale' => 'en_US',
            'symbols' => [
                \NumberFormatter::CURRENCY_SYMBOL => '',
                \NumberFormatter::MONETARY_GROUPING_SEPARATOR_SYMBOL => ' '
            ],
            'attributes' => [
                \NumberFormatter::MIN_FRACTION_DIGITS => 2
            ],
        ],
        'decimal' => [
            'formatter' => \NumberFormatter::DECIMAL,
            'locale' => 'en_US',
            'symbols' => [
                NumberFormatter::GROUPING_SEPARATOR_SYMBOL=>'',
            ],
            'attributes' => [
                \NumberFormatter::MIN_FRACTION_DIGITS => 2
            ],
        ],
    ],

];
