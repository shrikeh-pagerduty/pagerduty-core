<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Push as PushEntity;

class Push implements Hydrator
{
    public function supports($type)
    {
        return 'push_notification_contact_method' === $type;
    }

    public function hydrate(stdClass $dto)
    {
        return new PushEntity(
            $dto->address,
            $dto->device_type,
            $dto->sounds,
            $dto->blacklisted
      );
    }
}
