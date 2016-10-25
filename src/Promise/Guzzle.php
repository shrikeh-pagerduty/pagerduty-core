<?php

namespace Shrikeh\PagerDuty\Promise;

use Shrikeh\PagerDuty\Promise;
use GuzzleHttp\Promise\PromiseInterface;

final class Guzzle implements Promise
{
    private $promise;

    public function __construct(PromiseInterface $promise)
    {
        $this->promise = $promise;
    }

    public function then(
      callable $onFulfilled = null,
      callable $onRejected = null
    ) {
        return $this->promise->then($onFulfilled, $onRejected);
    }

    public function wait($unwrap = true)
    {
        return $this->promise->wait($unwrap);
    }
}
