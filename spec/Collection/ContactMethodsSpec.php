<?php

namespace spec\Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\Entity\ContactMethod;
use Shrikeh\PagerDuty\Entity\ContactMethod\ContactMethod as ContactMethodEntity;
use GuzzleHttp\Psr7\Uri;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Phone;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContactMethodsSpec extends ObjectBehavior
{
    public function let(
        ContactMethod $method1,
        ContactMethod $method2,
        ContactMethod $method3
    ) {
        $this->beConstructedThroughFromArray([$method1, $method2, $method3]);
    }

    function it_is_an_iterable_list_of_contact_methods($method1)
    {
        $this->current()->shouldReturn($method1);
    }

    function it_filters_out_blacklisted_methods() {
        $blackListedMethod = $this->contactMethod($this->phone(true));
        $whiteListedMethod = $this->contactMethod($this->phone(false));
        $this->beConstructedThroughFromArray([$blackListedMethod, $whiteListedMethod]);
        $this->accept()->shouldReturn(false);
        
        //$this->next();

    }

    function it_throws_an_exception_if_you_try_to_set_add_a_contact_method(
        $method1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetSet($method1, 'foo');
    }

    function it_throws_an_exception_if_you_try_to_unset_a_contact_method(
        $method1
    ) {
        $this->shouldThrow(
            'Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException'
        )->duringOffsetUnset($method1);
    }

    private function contactMethod($resource)
    {
        return ContactMethodEntity::fromApi(
            $resource,
            new Uri('https://github.com/'),
            'foo',
            'bar'
        );
    }

    private function phone($blacklist = false)
    {
        return new Phone('000000', '44', $blacklist);
    }
}
