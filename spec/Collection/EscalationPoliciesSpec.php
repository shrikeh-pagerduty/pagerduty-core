<?php

namespace spec\Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\Entity\EscalationPolicy;
use Shrikeh\PagerDuty\Collection\EscalationPolicies;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EscalationPoliciesSpec extends ObjectBehavior
{

    public function let(
        EscalationPolicy $policy1,
        EscalationPolicy $policy2,
        EscalationPolicy $policy3
    ) {
        $this->beConstructedWith([$policy1, $policy2, $policy3]);
    }

    function it_throws_an_exception_if_you_try_to_set_a_policy(
        $policy1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetSet($policy1, 'foo');
    }

    function it_throws_an_exception_if_you_try_to_unset_a_policy(
        $policy1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetUnset($policy1);
    }
}
