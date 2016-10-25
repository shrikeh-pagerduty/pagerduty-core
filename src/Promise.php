<?php

namespace Shrikeh\PagerDuty;

interface Promise
{
    public function then(
      callable $onFulfilled = null,
      callable $onRejected = null
    );

    public function wait($unwrap = true);
}
