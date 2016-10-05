<?php

namespace Shrikeh\PagerDuty\Repository;

interface OnCalls
{
    const ENDPOINT = '/oncalls';

    public function get();
}
