<?php

namespace App\Helpers;

use App\Http\Requests\UserAuth\LoginRequest;
use Illuminate\Cache\RateLimiter;

class ThrottleLogin
{
    private $lockTime;
    private $maxAttempt;
    private $request;

    public function __construct(LoginRequest $request, $maxAttempt = 5, $lockTime = 60){
        $this->request = $request;
        $this->maxAttempt = $maxAttempt;
        $this->lockTime = $lockTime;
    }

    public function isMaxReached()
    {
        return app(RateLimiter::class)->tooManyAttempts(
            $this->key(),
            $this->maxAttempt,
            $this->lockTime / 60
        );
    }


    public function increment()
    {
        app(RateLimiter::class)->hit(
            $this->key()
        );
    }

    public function remaining()
    {
        return app(RateLimiter::class)->retriesLeft(
            $this->key(),
            $this->maxAttempt
        );
    }

    public function remainingTime()
    {
        return app(RateLimiter::class)->availableIn(
            $this->key()
        );
    }

    public function clear()
    {
        app(RateLimiter::class)->clear(
            $this->key()
        );
    }

    protected function key()
    {
        return mb_strtolower($this->request->input('email')).'|'.$this->request->ip();
    }
}