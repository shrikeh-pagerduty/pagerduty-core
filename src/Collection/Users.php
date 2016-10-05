<?php

namespace Shrikeh\PagerDuty\Collection;

use IteratorIterator;
use SplObjectStorage;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\User;

final class Users extends IteratorIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\ImmutableCollection;

    public function __construct($onCalls)
    {
        parent::__construct(new SplObjectStorage());

        foreach ($onCalls as $oncall) {
            $this->appendUser($oncall);
        }
        $this->getInnerIterator()->rewind();
    }

    private function appendUser(User $oncall)
    {
        $this->getInnerIterator()->attach($oncall);
    }
}
