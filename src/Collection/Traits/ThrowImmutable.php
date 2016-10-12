<?php

namespace Shrikeh\PagerDuty\Collection\Traits;

use Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException;

trait ThrowImmutable
{
    protected function throwImmutable($msg, $errorCode = null)
    {
        throw new ImmutableCollectionException($msg, $errorCode);
    }
}
