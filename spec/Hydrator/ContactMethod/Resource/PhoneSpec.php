<?php

namespace spec\Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Phone as PhoneEntity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PhoneSpec extends ObjectBehavior
{
    function it_returns_true_if_it_supports_the_type() {
        $this->supports('phone_contact_method')->shouldReturn(true);
    }

    function it_returns_false_if_it_does_not_support_the_type() {
        $this->supports('email_contact_method')->shouldReturn(false);
    }

    function it_hydrates_a_phone_resource_object(stdClass $dto)
    {
        $dto->blacklisted = false;
        $dto->address = '111111111';
        $dto->country_code = '44';
        $this->hydrate($dto)->shouldBeAnInstanceOf(
            'Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Phone'
        );
    }
}
