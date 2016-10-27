<?php

namespace Shrikeh\PagerDuty\Hydrator;

use stdClass;
use Shrikeh\PagerDuty\Entity\EscalationPolicy\EscalationPolicy as PolicyEntity;
use Shrikeh\PagerDuty\Hydrator;

class EscalationPolicy implements Hydrator
{
    private $uriHydrator;

    public function __construct(Hydrator $uriHydrator)
    {
        $this->uriHydrator = $uriHydrator;
    }


    public function hydrate(stdClass $dto)
    {
        return new PolicyEntity(
            $dto->summary,
            $dto->id,
            $this->uriHydrator->hydrate($dto)
        );
    }

    public function supports($token)
    {
        return 'escalation_policy' === $token;
    }
}
