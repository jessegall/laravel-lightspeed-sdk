<?php

namespace JesseGall\LightspeedSDK\Laravel\Tests;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{

    protected function getEnvironmentSetUp($app)
    {
        $this->setUpEnv($app);

        $this->setConfig($app);
    }

    private function setUpEnv($app)
    {
        $app->useEnvironmentPath(__DIR__ . '/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
    }

    private function setConfig($app)
    {
        $app->config->set('lightspeed.api.server', env('LIGHTSPEED_API_SERVER'));
        $app->config->set('lightspeed.api.key', env('LIGHTSPEED_API_KEY'));
        $app->config->set('lightspeed.api.secret', env('LIGHTSPEED_API_SECRET'));
        $app->config->set('lightspeed.api.language', env('LIGHTSPEED_API_LANGUAGE'));
    }

}