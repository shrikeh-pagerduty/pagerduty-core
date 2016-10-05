<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod\Resource;

use Shrikeh\PagerDuty\Entity\ContactMethod\Resource;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Type;

final class Email implements Resource
{
    use Type;

    private $emailAddress;
    private $sendShortEmail;
    private $sendHtmlEmail;

    public function __construct(
        $emailAddress,
        $sendShortEmail,
        $sendHtmlEmail
    ) {
        $this->emailAddress = $emailAddress;
        $this->sendShortEmail = (bool) $sendShortEmail;
        $this->sendHtmlEmail = (bool) $sendHtmlEmail;
    }

    public function __toString()
    {
        return $this->email();
    }

    public function email()
    {
        return $this->emailAddress;
    }

    public function sendShortMail()
    {
        return $this->sendShortEmail;
    }

    public function sendHtmlEmail()
    {
        return $this->sendHtmlEmail;
    }
}
