<?php

namespace Shrikeh\PagerDuty\Collection\Traits;

use Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException;

trait ThrowImmutable
{
    /**
     * Overrides the default DomainException thrown for immutable collections.
     * @throws Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException
     */
    protected function throwImmutable($msg, $errorCode = null)
    {
        throw new ImmutableCollectionException($msg, $errorCode);
    }
}
