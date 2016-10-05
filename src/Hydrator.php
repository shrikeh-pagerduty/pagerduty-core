<?php

namespace Shrikeh\PagerDuty;

use stdClass;

interface Hydrator
{
    public function supports($token);

    public function hydrate(stdClass $dto);
}
