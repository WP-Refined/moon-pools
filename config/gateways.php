<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cardano Blockchain Gateways
    |--------------------------------------------------------------------------
    |
    | External APIs consumed to receive Blockchain data.
    |
    */

    'blockfrost' => [
        'api_url' => env('GATEWAY_BF_API_URL', 'https://cardano-mainnet.blockfrost.io/api/v0'),
        'api_key' => env('GATEWAY_BF_API_KEY'),
    ],

];
