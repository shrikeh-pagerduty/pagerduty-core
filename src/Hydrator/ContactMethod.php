<?php

namespace Shrikeh\PagerDuty\Hydrator;

use Shrikeh\PagerDuty\Hydrator;
use GuzzleHttp\Psr7\Uri;
use Shrikeh\PagerDuty\Entity\ContactMethod\ContactMethod as ContactMethodEntity;

use stdClass;

final class ContactMethod implements Hydrator
{
    public function __construct(Hydrator $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    public function __invoke($method)
    {
        return $this->hydrate($method);
    }

    public function hydrate(stdClass $dto)
    {
        return ContactMethodEntity::fromApi(
            $this->hydrator->hydrate($dto),
            new Uri($dto->self),
            $dto->summary,
            $dto->label
        );
    }

    public function supports($token)
    {

    }
}
