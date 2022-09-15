<?php

namespace JesseGall\LightspeedSDK\Laravel\Tests;

use Illuminate\Support\Env;
use JesseGall\LightspeedSDK\Laravel\Providers\LightspeedSDKServiceProvider;
use JesseGall\LightspeedSDK\LightspeedSDK;
use Orchestra\Testbench\Concerns\CreatesApplication;

class LightspeedSDKServiceProviderTest extends TestCase
{
    protected $loadEnvironmentVariables = true;

    private LightspeedSDKServiceProvider $provider;

    protected function setUp(): void
    {
        parent::setUp();

        $this->provider = new LightspeedSDKServiceProvider($this->app);

        $this->provider->register();

        $this->provider->boot();
    }

    public function test_sdk_properties_are_set()
    {
        $sdk = LightspeedSDK::instance();

        $this->assertEquals(env('LIGHTSPEED_API_SERVER'), $sdk->get('api.server'));
        $this->assertEquals(env('LIGHTSPEED_API_KEY'), $sdk->get('api.key'));
        $this->assertEquals(env('LIGHTSPEED_API_SECRET'), $sdk->get('api.secret'));
        $this->assertEquals(env('LIGHTSPEED_API_LANGUAGE'), $sdk->get('api.language'));
    }


}