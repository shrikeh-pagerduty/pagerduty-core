<?php

namespace Shrikeh\PagerDuty\Callback;


use Shrikeh\PagerDuty\Callback;
use Shrikeh\PagerDuty\Parser as ParserInterface;
use Shrikeh\PagerDuty\Promise;
use Psr\Http\Message\ResponseInterface;

final class Parser implements Callback
{
    private $promise;

    private $parser;

    private $result;

    public function __construct(Promise $promise, ParserInterface $parser)
    {
        $this->promise  = $promise;
        $this->parser   = $parser;
        $this->promise->then($this);
    }

    public function __invoke(ResponseInterface $response)
    {
        $this->result = $this->parser->fromResponse($response);
    }

    public function result()
    {
        $this->promise->wait();
        return $this->result;
    }
}
