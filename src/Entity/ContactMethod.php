<?php

namespace Shrikeh\PagerDuty\Entity;

interface ContactMethod
{
    public function __toString();

    public function resource();

    public function summary();

    public function label();
}
