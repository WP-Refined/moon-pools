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

    // Amounts are stored in 'Lovelaces', which is the smallest quanta of ADA.
    'lovelaces' => [
        'conversion' => 1000000, // 1 ADA is 1,000,000 Lovelaces
    ],

    'blockfrost' => [
        'api_url' => env('GATEWAY_BF_API_URL', 'https://cardano-mainnet.blockfrost.io/api/v0'),
        'api_key' => env('GATEWAY_BF_API_KEY'),
        'sync_enabled' => env('GATEWAY_SYNC', false),
        'full_sync' => env('GATEWAY_FULL_SYNC', false),
        'pool_list_sync' => env('GATEWAY_POOL_LIST_SYNC', false),
        'meta_sync' => env('GATEWAY_META_SYNC', false),
        'detail_sync' => env('GATEWAY_DETAIL_SYNC', false),
        'network_sync' => env('GATEWAY_NETWORK_SYNC', false),
    ],

];
