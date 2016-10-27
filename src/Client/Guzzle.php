<?php

namespace Shrikeh\PagerDuty\Client;

use Psr\Http\Message\RequestInterface;
use GuzzleHttp\ClientInterface;
use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Promise\Guzzle as Promise;

class Guzzle implements Client
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function send(RequestInterface $request, array $options = [])
    {
        $promise = $this->client->sendAsync($request, $options);
        return new Promise($promise);
    }
}
