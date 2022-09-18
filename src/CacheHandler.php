<?php

namespace JesseGall\LightspeedSDK\Laravel;

use Illuminate\Support\Facades\Cache;
use JesseGall\Proxy\ConcludedInteraction;
use JesseGall\Proxy\Contracts\HandlesCache;

class CacheHandler implements HandlesCache
{

    public function put(string $key, ConcludedInteraction $interaction): void
    {
        Cache::put($key, $interaction);
    }

    public function get(string $key): ConcludedInteraction
    {
        return Cache::get($key);
    }

    public function has(string $key): bool
    {
        return Cache::has($key);
    }

}