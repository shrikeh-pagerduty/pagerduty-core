<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\EscalationPolicy;

final class EscalationPolicies extends IteratorIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\Traits\ImmutableCollection;

    protected function append(EscalationPolicy $policy)
    {
        $this->getStorage()->attach($policy);
    }
}
