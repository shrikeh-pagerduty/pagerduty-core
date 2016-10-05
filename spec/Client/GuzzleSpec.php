<?php

namespace spec\Shrikeh\PagerDuty\Client;

use Shrikeh\PagerDuty\Client\Guzzle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class GuzzleSpec extends ObjectBehavior
{
    function it_sends_a_request(
        ClientInterface $client,
        ResponseInterface $response
    ) {
        $method = 'GET';
        $action = 'test';
        $client->request($method, $action, [])->willReturn($response);
        $this->beConstructedWith($client);
        $this->request($method, $action)->shouldReturn($response);
    }
}
