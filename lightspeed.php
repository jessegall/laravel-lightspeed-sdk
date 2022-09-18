<?php

return [

    'cache' => [
        /**
         * Indicates whether caching should be used
         */
        'enabled' => true,

        /**
         * The cache handler, must be an instance of JesseGall\Proxy\Contracts\HandlesCache
         */
        'handler' => JesseGall\LightspeedSDK\Laravel\CacheHandler::class,
    ],

    /**
     * The api credentials
     */
    'api' => [
        'server' => env('LIGHTSPEED_API_SERVER'),
        'key' => env('LIGHTSPEED_API_KEY'),
        'secret' => env('LIGHTSPEED_API_SECRET'),
        'language' => env('LIGHTSPEED_API_LANGUAGE'),
    ]
];
