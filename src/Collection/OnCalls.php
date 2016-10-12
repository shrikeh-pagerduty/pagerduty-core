<?php

namespace Shrikeh\PagerDuty\Collection;

use Shrikeh\Collection\ImmutableBoilerPlate;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\OnCall;

final class OnCalls extends ImmutableBoilerPlate implements Collection
{
    use \Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

    protected function append(OnCall $oncall)
    {
        $this->getStorage()->attach($oncall);
    }

    public function filteredByLevel($level)
    {
        $oncalls = [];

        foreach ($this->getStorage() as $oncall) {
            if ($oncall->level() === $level) {
                $oncalls[] = $oncall;
            }
        }
        return static::fromArray($oncalls);
    }
}
