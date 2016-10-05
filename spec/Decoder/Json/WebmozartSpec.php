<?php

namespace spec\Shrikeh\PagerDuty\Decoder\Json;

use Shrikeh\PagerDuty\Decoder\Json\Webmozart;
use Webmozart\Json\JsonDecoder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebmozartSpec extends ObjectBehavior
{
    function let(JsonDecoder $decoder)
    {
        $this->beConstructedWith($decoder);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Webmozart::class);
    }

    function it_decodes_a_string(
        \stdClass $obj,
        $decoder
    )
    {
        $string = 'foo';
        $decoder->decode($string)->willReturn($obj);
        $this->decode($string)->shouldReturn($obj);
    }
}
