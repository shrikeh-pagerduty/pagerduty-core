<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\User;

final class Users extends IteratorIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\Traits\ImmutableCollection;

    protected function append(User $oncall)
    {
        $this->getStorage()->attach($oncall);
    }
}
