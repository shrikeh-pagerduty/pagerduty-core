<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod\Resource;

trait Blacklisted
{
    private $blacklisted = false;

    public function blacklisted()
    {
        return (bool) $this->blacklisted;
    }
}
