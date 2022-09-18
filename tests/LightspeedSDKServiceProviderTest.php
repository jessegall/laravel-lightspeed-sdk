<?php

namespace JesseGall\LightspeedSDK\Laravel\Tests;

use JesseGall\LightspeedSDK\Api;
use JesseGall\LightspeedSDK\Laravel\CacheHandler;
use JesseGall\LightspeedSDK\Laravel\Providers\LightspeedSDKServiceProvider;
use JesseGall\LightspeedSDK\LightspeedSDK;

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

    public function test_api_credentials_are_set()
    {
        $sdk = LightspeedSDK::instance();

        $this->assertNotNull($sdk->get('api.server'));
        $this->assertNotNull($sdk->get('api.key'));
        $this->assertNotNull($sdk->get('api.secret'));
        $this->assertNotNull($sdk->get('api.language'));

        $this->assertEquals(env('LIGHTSPEED_API_SERVER'), $sdk->get('api.server'));
        $this->assertEquals(env('LIGHTSPEED_API_KEY'), $sdk->get('api.key'));
        $this->assertEquals(env('LIGHTSPEED_API_SECRET'), $sdk->get('api.secret'));
        $this->assertEquals(env('LIGHTSPEED_API_LANGUAGE'), $sdk->get('api.language'));
    }

    public function test_cache_handler_is_set()
    {
        $this->assertInstanceOf(CacheHandler::class, Api::getCacheHandler());
    }

}