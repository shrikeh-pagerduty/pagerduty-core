<?php

namespace Shrikeh\PagerDuty\Parser;

use Psr\Http\Message\ResponseInterface;

interface OnCall
{
    public function parseResponse(ResponseInterface $response);
}
