<?php

namespace Shrikeh\PagerDuty\Entity\EscalationPolicy;

use Shrikeh\PagerDuty\Entity\EscalationPolicy as EscalationPolicyInterface;

final class EscalationPolicy implements EscalationPolicyInterface
{
    private $summary;

    private $id;

    private $self;

    public function __construct(
        $summary,
        $id,
        $self = null
    ) {
        $this->summary = $summary;
        $this->id = $id;
        $this->self = $self;
    }

    public function summary()
    {

    }

    public function self()
    {

    }
}
