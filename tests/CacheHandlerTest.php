<?php

namespace JesseGall\LightspeedSDK\Laravel\Tests;

use Illuminate\Support\Facades\Cache;
use JesseGall\LightspeedSDK\Laravel\CacheHandler;
use JesseGall\LightspeedSDK\Laravel\Tests\TestClasses\TestInteraction;
use JesseGall\Proxy\ConcludedInteraction;

class CacheHandlerTest extends TestCase
{

    private CacheHandler $handler;
    private TestInteraction $interaction;
    private ConcludedInteraction $concluded;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CacheHandler();

        $this->concluded = new ConcludedInteraction($this->interaction = new TestInteraction(new class {
            private string $property = 'value';

            public function getProperty(): string
            {
                return $this->property;
            }
        }));
    }

    public function test_interactions_can_be_put_in_cache()
    {
        $hash = $this->interaction->toHash();

        Cache::shouldReceive('put')
            ->once()
            ->with($hash, $this->concluded);

        $this->handler->put($hash, $this->concluded);
    }

    public function test_interactions_can_be_retrieved_from_cache()
    {
        $hash = $this->interaction->toHash();

        Cache::shouldReceive('get')
            ->once()
            ->with($hash)
            ->andReturn($this->concluded);

        $this->assertEquals(
            $this->concluded,
            $this->handler->get($hash)
        );
    }

    public function test_has_method_returns_true_when_interaction_is_cached()
    {
        $hash = $this->interaction->toHash();

        Cache::shouldReceive('has')
            ->once()
            ->with($hash)
            ->andReturn(true);

        $this->assertTrue($this->handler->has($hash));
    }

    public function test_has_method_returns_false_when_interaction_is_not_cached()
    {
        $hash = $this->interaction->toHash();

        Cache::shouldReceive('has')
            ->once()
            ->with($hash)
            ->andReturn(false);

        $this->assertFalse($this->handler->has($hash));
    }

}