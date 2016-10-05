<?php

namespace spec\Shrikeh\PagerDuty\Repository\OnCalls;

use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Parser;
use Shrikeh\PagerDuty\Repository\OnCalls\OnCallsRepository;
use Shrikeh\PagerDuty\Collection\EscalationPolicyCollection;
use Shrikeh\PagerDuty\Parser\OnCall as OnCallParser;
use Psr\Http\Message\ResponseInterface;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnCallRepositorySpec extends ObjectBehavior
{
    function let(Client $client, OnCallParser $parser)
    {
        $this->beConstructedWith($client, $parser);
    }

    function it_returns_a_collection_of_who_is_on_call(
        ResponseInterface $response,
        EscalationPolicyCollection $collection,
        $client,
        $parser
    ) {
        $string = 'some json';
        $client->request('GET', OnCallsRepository::ENDPOINT)->willReturn($response);
        $parser->parseResponse($response)->willReturn($collection);
        $this->get()->shouldReturn($collection);
    }
}
