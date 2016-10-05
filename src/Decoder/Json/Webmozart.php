<?php

namespace Shrikeh\PagerDuty\Decoder\Json;

use Shrikeh\PagerDuty\Decoder\Json;
use Webmozart\Json\JsonDecoder;

final class Webmozart implements Json
{
    private $decoder;

    public function __construct(JsonDecoder $decoder)
    {
        $this->decoder = $decoder;
    }

    public function decode($string)
    {
        return $this->decoder->decode($string);
    }
}
