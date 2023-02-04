<?php
return [
    'account-types' => [
        [
            'id' => 1,
            'name' => 'cash'
        ],
        [
            'id' => 2,
            'name' => 'bank deposit'
        ],
        [
            'id' => 3,
            'name' => 'bank credit'
        ],
    ],
    'accounts' => [
        [
            'name' => 'wallet',
            'user_id' => 1,
            'account_type_id' => 1,
            'balance' => 0,
            'currency_id'=>'USD',
        ],
    ]
];
