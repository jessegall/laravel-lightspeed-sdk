<?php

namespace JesseGall\LightspeedSDK\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use JesseGall\LightspeedSDK\LightspeedSDK;

class LightspeedSDKServiceProvider extends ServiceProvider
{

    private LightspeedSDK $sdk;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->sdk = LightspeedSDK::instance();
    }

    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->setSDKProperties();
    }

    private function setSDKProperties()
    {
        $this->sdk->set('api.server', config('lightspeed.api.server'));
        $this->sdk->set('api.key', config('lightspeed.api.key'));
        $this->sdk->set('api.secret', config('lightspeed.api.secret'));
        $this->sdk->set('api.language', config('lightspeed.api.language'));
    }

}