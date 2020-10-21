<?php

namespace Tests;

use Illuminate\Support\Facades\Http;
use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\BeforeFirstTestHook;
use PHPUnit\Runner\AfterTestFailureHook;

final class MyConfigurableExtension implements BeforeFirstTestHook, AfterLastTestHook, AfterTestFailureHook
{
    protected $hasError = false;

    public function __construct()
    {
        //
    }

    public function executeAfterTestFailure(string $test, string $message, float $time) : void
    {
        // echo 'After TEST FAILURE';

        $this->toggleLights(false);
        sleep(1);
        $this->toggleLights(true);
        sleep(1);
        $this->toggleLights(false);
        sleep(1);
        $this->toggleLights(true);
        sleep(1);

        $this->hasError = true;
    }

    public function executeAfterLastTest(): void
    {
        if (! $this->hasError) {
            Http::put('http://192.168.2.23/api/7lA86r1P9LnQKPLhyFiU2sJGIgX54Nn1U0CuIlc3/lights/3/state', [
                'on' => true,
                'hue' => 26870,
                'sat' => 204,
                'bri' => 20,
            ]);
        }
    }

    public function toggleLights($on)
    {
        Http::put('http://192.168.2.23/api/7lA86r1P9LnQKPLhyFiU2sJGIgX54Nn1U0CuIlc3/lights/3/state', [
            'on' => $on,
            'hue' => 65535,
            'sat' => 255,
            'bri' => 20,
        ]);
    }

    public function executeBeforeFirstTest(): void
    {
        // echo 'BEFORE FIRST TEST';
    }


}
