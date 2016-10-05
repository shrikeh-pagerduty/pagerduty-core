<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Email as EmailEntity;

final class Email implements Hydrator
{
    public function supports($type)
    {
        return 'email_contact_method' === $type;
    }

    public function hydrate(stdClass $dto)
    {
        return new EmailEntity(
            $dto->address,
            $dto->send_short_email,
            $dto->send_html_email
        );
    }
}
