<?php

namespace spec\Shrikeh\PagerDuty\Hydrator\Uri;

use Shrikeh\PagerDuty\Hydrator\Uri\Guzzle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Guzzle::class);
    }
}
