<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\OnCall;
use Shrikeh\Collection\NamedConstructorsTrait;
use Shrikeh\Collection\ObjectStorageTrait;
use Shrikeh\Collection\ImmutableCollectionTrait;
use Shrikeh\Collection\ClosedOuterIteratorTrait;
use Shrikeh\Collection\OuterIteratorTrait;
use Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

final class OnCalls extends IteratorIterator implements Collection
{
    use NamedConstructorsTrait;
    use ObjectStorageTrait;
    use ImmutableCollectionTrait;
    use ClosedOuterIteratorTrait;
    use OuterIteratorTrait;
    use ThrowImmutable {
        ThrowImmutable::throwImmutable insteadof ImmutableCollectionTrait;
    }

    protected function append(OnCall $oncall)
    {
        $this->getStorage()->attach($oncall);
    }

    public function filteredByLevel($level)
    {
        $oncalls = [];

        foreach ($this->getStorage() as $oncall) {
            if ($oncall->level() === $level) {
                $oncalls[] = $oncall;
            }
        }
        return static::fromArray($oncalls);
    }
}
