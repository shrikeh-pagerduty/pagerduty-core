<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod\Resource;

trait Type
{
    public function type()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
