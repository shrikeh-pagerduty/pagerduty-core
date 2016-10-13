<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\EscalationPolicy;
use Shrikeh\Collection\NamedConstructorsTrait;
use Shrikeh\Collection\ObjectStorageTrait;
use Shrikeh\Collection\ImmutableCollectionTrait;
use Shrikeh\Collection\ClosedOuterIteratorTrait;
use Shrikeh\Collection\OuterIteratorTrait;
use Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

final class EscalationPolicies extends IteratorIterator implements Collection
{
    use NamedConstructorsTrait;
    use ObjectStorageTrait;
    use ImmutableCollectionTrait;
    use ClosedOuterIteratorTrait;
    use OuterIteratorTrait;
    use ThrowImmutable {
        ThrowImmutable::throwImmutable insteadof ImmutableCollectionTrait;
    }

    protected function append(EscalationPolicy $policy)
    {
        $this->getStorage()->attach($policy);
    }
}
