<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\EscalationPolicy;

final class EscalationPolicies extends IteratorIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\ImmutableCollection;

    public function __construct($escalationPolicies)
    {
        parent::__construct(new \SplObjectStorage());
        foreach ($escalationPolicies as $policy) {
            $this->appendPolicy($policy);
        }
        $this->getInnerIterator()->rewind();
    }

    private function appendPolicy(EscalationPolicy $policy)
    {
        $this->getInnerIterator()->attach($policy);
    }
}
