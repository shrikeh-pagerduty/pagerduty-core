<?php

namespace Shrikeh\PagerDuty\Repository\OnCalls;

use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Parser;
use Shrikeh\PagerDuty\Repository\OnCalls;
use Shrikeh\PagerDuty\Parser\OnCall as OnCallParser;

class OnCallsRepository implements OnCalls
{
    private $client;

    private $parser;

    public function __construct(
        Client $client,
        OnCallParser $parser
    ) {
        $this->client   = $client;
        $this->parser   = $parser;
    }

    public function get()
    {
        return $this->parser->parseResponse($this->client->request(
            'GET',
            static::ENDPOINT
        ));
    }

    public function users()
    {
      return $this->parser->parseResponse($this->client->request(
          'GET',
          static::ENDPOINT,
          ['query' => 'include[]=users']
      ));
    }
}
