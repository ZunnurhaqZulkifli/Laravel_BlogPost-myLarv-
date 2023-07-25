<?php
namespace App\Services;

use App\Contracts\CounterContract;

class DummyCounter implements CounterContract
{
    public function increment(string $key, array $tags = null): int 
    {
        dd("This is a dummy counter");
        return 0;
    }

}