<?php

namespace spec\Shrikeh\PagerDuty\Entity\ContactMethod\Resource;

use stdClass;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Push;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PushSpec extends ObjectBehavior
{
    function it_validates_the_address_during_construction()
    {
        $this->beConstructedWith('foobarbaz', 'ios', [], false);
        $this->shouldThrow('InvalidArgumentException')->duringInstantiation();
    }

    function it_returns_the_address()
    {
        $address = '0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef';
        $this->beConstructedWith(
            $address,
            'ios',
            [],
            false
        );

        $this->address()->shouldReturn($address);
    }

    function it_tests_the_address_value_is_in_range()
    {
        $address = str_repeat('f', Push::MAX_ADDRESS_LENGTH + 1);
        $this->beConstructedWith(
            $address,
            'ios',
            [],
            false
        );
        $this->shouldThrow('OutOfBoundsException')->duringInstantiation();
    }

    function it_returns_the_device_type()
    {
      $deviceType = 'ios';
      $address = str_repeat('f', Push::MAX_ADDRESS_LENGTH);
      $this->beConstructedWith(
          $address,
          $deviceType,
          [],
          false
      );
      $this->deviceType()->shouldReturn($deviceType);
    }

    function it_returns_the_sounds(stdClass $sounds) {
        $address = str_repeat('f', Push::MAX_ADDRESS_LENGTH);
        $this->beConstructedWith(
            $address,
            'ios',
            [$sounds],
            false
        );
        $this->sounds()->shouldReturn([$sounds]);
    }
}
