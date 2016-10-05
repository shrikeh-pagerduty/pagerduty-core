<?php

namespace Shrikeh\PagerDuty;

interface Client
{
    public function request($method, $uri, array $options = []);
}
