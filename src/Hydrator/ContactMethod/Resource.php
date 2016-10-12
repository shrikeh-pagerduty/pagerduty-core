<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod;

use stdClass;

use Shrikeh\Collection\ImmutableBoilerPlate;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Collection;

class Resource extends ImmutableBoilerPlate implements Collection, Hydrator
{
    use \Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

    public function hydrate(stdClass $dto)
    {
        if (isset($dto->type)) {
            foreach ($this->getStorage() as $hydrator) {
                if ($hydrator->supports($dto->type)) {
                    return $hydrator->hydrate($dto);
                }
            }
        }
    }

    public function supports($token)
    {
        return 'type' === $token;
    }

    protected function append(Hydrator $hydrator)
    {
        $this->getStorage()->attach($hydrator);
    }
}
