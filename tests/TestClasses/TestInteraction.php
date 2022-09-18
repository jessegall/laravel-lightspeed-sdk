<?php

namespace JesseGall\LightspeedSDK\Laravel\Tests\TestClasses;

use JesseGall\Proxy\Interactions\Concerns\HasResult;
use JesseGall\Proxy\Interactions\Contracts\InteractsAndReturnsResult;
use JesseGall\Proxy\Interactions\Interaction;

class TestInteraction extends Interaction implements InteractsAndReturnsResult
{
    use HasResult;
}