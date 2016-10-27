<?php

namespace Shrikeh\PagerDuty;

use Psr\Http\Message\ResponseInterface;

interface Parser
{
    public function fromResponse(ResponseInterface $response);
}
