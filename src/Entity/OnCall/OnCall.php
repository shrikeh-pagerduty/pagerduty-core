<?php

namespace Shrikeh\PagerDuty\Entity\OnCall;

use Shrikeh\PagerDuty\Entity\EscalationPolicy;
use Shrikeh\PagerDuty\Entity\User;
use Shrikeh\PagerDuty\Entity\OnCall as OnCallInterface;

final class OnCall implements OnCallInterface
{
    private $level;

    private $user;

    private $escalationPolicy;

    private $schedule;

    public function __construct(
        EscalationPolicy $policy,
        $user,
        $level,
        $schedule = null
    ) {
        $this->escalationPolicy = $policy;
        $this->user             = $user;
        $this->level            = $level;
        $this->schedule         = $schedule;
    }

    public function level()
    {
        return $this->level;
    }

    public function user()
    {
        return $this->user;
    }

    public function escalationPolicy()
    {
        return $this->escalationPolicy;
    }
}
