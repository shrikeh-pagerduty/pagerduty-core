<?php

namespace spec\Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SmsSpec extends ObjectBehavior
{
  function it_returns_true_if_it_supports_the_type() {
      $this->supports('sms_contact_method')->shouldReturn(true);
  }

  function it_returns_false_if_it_does_not_support_the_type() {
      $this->supports('email_contact_method')->shouldReturn(false);
  }

  function it_hydrates_an_sms_resource_object(stdClass $dto)
  {
      $dto->blacklisted = false;
      $dto->address = '111111111';
      $dto->country_code = '44';
      $dto->enabled = true;
      $this->hydrate($dto)->shouldBeAnInstanceOf(
          'Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Sms'
      );
  }
}
