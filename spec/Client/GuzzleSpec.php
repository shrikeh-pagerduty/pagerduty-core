<?php

namespace spec\Shrikeh\PagerDuty\Client;

use Shrikeh\PagerDuty\Client\Guzzle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Promise\PromiseInterface;

class GuzzleSpec extends ObjectBehavior
{
    function it_sends_a_request(
        ClientInterface $client,
        RequestInterface $request,
        PromiseInterface $promise
    ) {
        $client->sendAsync($request, [])->willReturn($promise);
        $this->beConstructedWith($client);
        $this->send($request, [])->shouldHaveType('Shrikeh\PagerDuty\Promise');
    }
}
