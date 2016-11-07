<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod;

interface Method
{
    public function __toString();

    public function type();
}
