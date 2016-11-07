<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod\Method;

trait Type
{
    public function type()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
