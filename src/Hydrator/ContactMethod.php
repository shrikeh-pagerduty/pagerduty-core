<?php
namespace Shrikeh\PagerDuty\Hydrator;

use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\ContactMethod\ContactMethod as ContactMethodEntity;

use stdClass;

final class ContactMethod implements Hydrator
{
    private $methodHydrator;
    private $uriHydrator;

    public function __construct(
        Hydrator $methodHydrator,
        Hydrator $uriHydrator
    ) {
        $this->resourceHydrator = $methodHydrator;
        $this->uriHydrator = $uriHydrator;
    }

    public function __invoke(stdClass $dto)
    {
        return $this->hydrate($dto);
    }

    public function hydrate(stdClass $dto)
    {
        return ContactMethodEntity::fromApi(
            $this->resourceHydrator->hydrate($dto),
            $this->uriHydrator->hydrate($dto),
            $dto->summary,
            $dto->label
        );
    }

    public function supports($token)
    {

    }
}
