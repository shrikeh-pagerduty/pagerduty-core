<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Phone as PhoneEntity;

final class Phone implements Hydrator
{
    public function supports($type)
    {
        return 'phone_contact_method' === $type;
    }

    public function hydrate(stdClass $dto)
    {
        return new PhoneEntity(
            $dto->address,
            $dto->country_code,
            $dto->blacklisted
        );
    }
}
