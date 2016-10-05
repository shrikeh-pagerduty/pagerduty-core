<?php

namespace spec\Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailSpec extends ObjectBehavior
{
  function it_returns_true_if_it_supports_the_type() {
      $this->supports('email_contact_method')->shouldReturn(true);

  }

  function it_returns_false_if_it_does_not_support_the_type() {
      $this->supports('phone_contact_method')->shouldReturn(false);
  }

  function it_hydrates_a_email_resource_object(stdClass $dto)
  {
      $dto->send_short_email = false;
      $dto->send_html_email = true;
      $dto->address = 'foo@example.com';
      $this->hydrate($dto)->shouldBeAnInstanceOf(
          'Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Email'
      );
  }
}
