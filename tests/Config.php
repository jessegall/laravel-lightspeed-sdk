<?php

namespace JesseGall\LightspeedSDK\Laravel\Tests;

use JesseGall\ContainsData\ContainsData;

class Config
{
    use ContainsData;

    public function __construct()
    {
        $this->set('lightspeed.api.server', env('LIGHTSPEED_API_SERVER'));
        $this->set('lightspeed.api.key', env('LIGHTSPEED_API_KEY'));
        $this->set('lightspeed.api.secret', env('LIGHTSPEED_API_SECRET'));
        $this->set('lightspeed.api.language', env('LIGHTSPEED_API_LANGUAGE'));
    }

}