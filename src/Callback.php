<?php

namespace Shrikeh\PagerDuty;

use Psr\Http\Message\ResponseInterface;

interface Callback
{
    public function __invoke(ResponseInterface $response);

    public function result();
}
