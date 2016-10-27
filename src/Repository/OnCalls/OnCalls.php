<?php

namespace Shrikeh\PagerDuty\Repository\OnCalls;

use Shrikeh\PagerDuty\Callback\Parser as Callback;

use Shrikeh\PagerDuty\Promise;
use GuzzleHttp\Psr7\Request;
use Shrikeh\PagerDuty\Parser;
use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Collection\Promise\OnCalls as OnCallsCollection;
use Shrikeh\PagerDuty\Repository\OnCalls as OnCallsInterface;

class OnCalls implements OnCallsInterface
{
    private $client;
    private $parser;

    public function __construct(
        Client $client,
        Parser $parser
    ) {
        $this->client   = $client;
        $this->parser   = $parser;
    }

    public function get()
    {
        $request = new Request(
            'GET',
            static::ENDPOINT
        );

        return $this->collection($this->client->send($request));
    }

    public function users()
    {

        $request = new Request(
            'GET',
            static::ENDPOINT,
            ['query' => 'include[]=users']
        );
    }

    private function collection(Promise $promise)
    {
        $callback = new Callback(
            $promise,
            $this->parser
        );

        return new OnCallsCollection($callback);
    }
}
