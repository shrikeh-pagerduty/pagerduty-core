<?php

namespace Shrikeh\PagerDuty\Collection;

use Shrikeh\Collection\ImmutableBoilerPlate;

use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\User;

final class Users extends ImmutableBoilerPlate implements Collection
{
    use \Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

    protected function append(User $oncall)
    {
        $this->getInnerIterator()->attach($oncall);
    }
}
