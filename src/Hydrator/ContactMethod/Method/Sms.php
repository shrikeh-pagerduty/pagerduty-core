<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod\Method;

use stdClass;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\ContactMethod\Method\Sms as SmsEntity;

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
