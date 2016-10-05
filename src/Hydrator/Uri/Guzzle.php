<?php

namespace Shrikeh\PagerDuty\Hydrator\Uri;

use stdClass;
use GuzzleHttp\Psr7\Uri;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Hydrator\Uri as UriHydrator;

final class Guzzle implements Hydrator, UriHydrator
{
    public function supports($key)
    {
        return 'self' === $key;
    }

    public function hydrate(stdClass $dto)
    {
        return new Uri($dto->self);
    }
}
