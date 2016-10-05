<?php

namespace Shrikeh\PagerDuty\Hydrator;

use stdClass;
use Shrikeh\PagerDuty\Collection\ContactMethods;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Hydrator\ContactMethod as ContactMethodHydrator;
use Shrikeh\PagerDuty\Hydrator\Uri as UriHydrator;
use Shrikeh\PagerDuty\Entity\User\User as UserEntity;

final class User implements Hydrator
{
    private $contactMethodsHydrator;
    private $uriHydrator;

    public function __construct(
        ContactMethodHydrator $contactMethodsHydrator,
        UriHydrator $uriHydrator
    ) {
        $this->contactMethodsHydrator = $contactMethodsHydrator;
        $this->uriHydrator = $uriHydrator;
    }

    public function hydrate(stdClass $dto)
    {
        return UserEntity::fromData(
            new ContactMethods(array_map($this->contactMethodsHydrator, $dto->contact_methods)),
            $this->uriHydrator->hydrate($dto),
            $dto->name,
            $dto->email,
            $dto->summary
        );
    }

    public function supports($token)
    {
        return ('user' === $token);
    }
}
