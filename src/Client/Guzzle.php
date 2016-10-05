<?php

namespace Shrikeh\PagerDuty\Client;

use GuzzleHttp\ClientInterface;
use Shrikeh\PagerDuty\Client;

class Guzzle implements Client
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function request($method, $action, array $options = [])
    {
        return $this->client->request($method, $action, $options);
    }
}
