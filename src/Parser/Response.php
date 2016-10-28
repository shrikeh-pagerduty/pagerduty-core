<?php

namespace Shrikeh\PagerDuty\Parser;

use stdClass;
use Psr\Http\Message\ResponseInterface;
use Shrikeh\PagerDuty\Parser;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Decoder\Json;

final class Response implements Parser
{
    private $decoder;

    private $hydrator;

    public function __construct(Json $decoder, Hydrator $hydrator)
    {
        $this->decoder = $decoder;
        $this->hydrator = $hydrator;
    }

    public function fromResponse(ResponseInterface $response)
    {
        $dto = $this->decode($response->getBody());
        return $this->hydrate($dto);
    }

    private function decode($string)
    {
        return $this->decoder->decode($string);
    }

    private function hydrate(stdClass $dto)
    {
        return $this->hydrator->hydrate($dto);
    }
}
