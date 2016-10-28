<?php

namespace spec\Shrikeh\PagerDuty\Parser;


use stdClass;
use Psr\Http\Message\ResponseInterface;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Decoder\Json;
use Shrikeh\PagerDuty\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResponseSpec extends ObjectBehavior
{
    function it_parses_a_response(
        ResponseInterface $response,
        Hydrator $hydrator,
        Json $decoder,
        Collection $collection,
        stdClass $dto
    ) {
        $this->beConstructedWith($decoder, $hydrator);
        $response->getBody()->willReturn('foo');
        $decoder->decode('foo')->willReturn($dto);
        $hydrator->hydrate($dto)->willReturn($collection);
        $this->fromResponse($response)->shouldReturn($collection);
    }
}
