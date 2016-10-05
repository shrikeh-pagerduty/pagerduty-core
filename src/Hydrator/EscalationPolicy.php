<?php

namespace Shrikeh\PagerDuty\Hydrator;

use stdClass;
use Shrikeh\PagerDuty\Entity\EscalationPolicy\EscalationPolicy as PolicyEntity;


class EscalationPolicy
{
    public function fromStdClass(stdClass $dto)
    {
        return new PolicyEntity();
    }
}
