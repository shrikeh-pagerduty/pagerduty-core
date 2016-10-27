<?php

namespace spec\Shrikeh\PagerDuty\Callback;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Shrikeh\PagerDuty\Parser;
use Shrikeh\PagerDuty\Promise;
use Shrikeh\PagerDuty\Collection;
use Psr\Http\Message\ResponseInterface;


class ParserSpec extends ObjectBehavior
{
    function it_calls_the_promise(
        Promise $promise,
        Parser $parser,
        ResponseInterface $response,
        Collection $collection
    ) {
        $this->beConstructedWith($promise, $parser);
        $promise->then($this)->shouldBeCalled();
        $parser->fromResponse($response)->willReturn($collection);
        $promise->wait()->willReturn($this->__invoke($response));
        $this->result()->shouldReturn($collection);
    }
}
