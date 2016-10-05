<?php

namespace spec\Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\Collection\OnCalls;
use Shrikeh\PagerDuty\Entity\OnCall;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnCallsSpec extends ObjectBehavior
{
    // public function getMatchers()
    // {
    //   return [
    //       'haveEntry(' => function (OnCalls $subject, OnCall $key) {
    //           return $subject->getInnerIterator()->offsetExists($key);
    //       }
    //   ];
    // }

    public function let(
        OnCall $entry1,
        OnCall $entry2,
        OnCall $entry3
    ) {
        $entry1->level()->willReturn(1);
        $entry2->level()->willReturn(2);
        $entry3->level()->willReturn(3);
        $this->beConstructedWith([$entry1, $entry2, $entry3]);
    }

    function it_returns_a_new_collection_when_filtered_by_level(
        $entry1,
        $entry2,
        $entry3
    ) {
        $this->filteredByLevel($entry2->level())->shouldBeAnInstanceOf(
            'Shrikeh\PagerDuty\Collection\OnCalls'
        );
    }

    function it_throws_an_exception_if_you_try_to_set_an_oncall(
        $entry2
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetSet($entry2, 'foo');
    }

    function it_throws_an_exception_if_you_try_to_unset_an_oncall(
        $entry1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetUnset($entry1);
    }
}
