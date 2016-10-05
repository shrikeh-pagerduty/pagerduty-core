<?php

namespace spec\Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use stdClass;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Push as PushEntity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PushSpec extends ObjectBehavior
{
      function it_returns_true_if_it_supports_the_type() {
          $this->supports('push_notification_contact_method')->shouldReturn(true);
      }

      function it_returns_false_if_it_does_not_support_the_type() {
          $this->supports('email_contact_method')->shouldReturn(false);
      }

      function it_hydrates_a_phone_resource_object(
          stdClass $dto,
          stdClass $sounds
      ) {
          $dto->blacklisted = false;
          $dto->address = '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef';
          $dto->device_type = 'ios';
          $sounds->type = 'alert_high_urgency';
          $sounds->file = 'file';
          $dto->sounds = [$sounds];
          $this->hydrate($dto)->shouldBeAnInstanceOf(
              'Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Push'
          );
      }
}
