<?php

namespace spec\Shrikeh\PagerDuty\Collection\Promise;

use Shrikeh\PagerDuty\Callback;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\OnCall;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnCallsSpec extends ObjectBehavior
{
    function it_uses_the_callback(
        Callback $callback,
        Collection $collection,
        OnCall $oncall
    ) {
        $collection->current()->willReturn($oncall);
        $callback->result()->willReturn($collection);
        $this->beConstructedWith($callback);
        $this->current()->shouldReturn($oncall);
    }
}
