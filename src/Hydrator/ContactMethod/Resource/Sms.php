<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Sms as SmsEntity;

class Sms implements Hydrator
{
    public function supports($type)
    {
        return 'sms_contact_method' === $type;
    }

    public function hydrate(stdClass $dto)
    {
        return new SmsEntity(
            $dto->address,
            $dto->country_code,
            $dto->enabled,
            $dto->blacklisted
        );
    }
}
