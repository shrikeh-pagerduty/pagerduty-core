<?php

namespace Shrikeh\PagerDuty\Collection;

use Shrikeh\Collection\ImmutableBoilerPlate;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\EscalationPolicy;

final class EscalationPolicies extends ImmutableBoilerPlate implements Collection
{
    use \Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

    protected function append(EscalationPolicy $policy)
    {
        $this->getStorage()->attach($policy);
    }
}
