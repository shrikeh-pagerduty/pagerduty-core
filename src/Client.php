<?php

namespace Shrikeh\PagerDuty;

use Psr\Http\Message\RequestInterface;

interface Client
{
    public function send(RequestInterface $request, array $options = []);
}
