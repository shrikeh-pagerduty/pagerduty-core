<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod;

use stdClass;
use IteratorIterator;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\Collection\NamedConstructorsTrait;
use Shrikeh\Collection\ObjectStorageTrait;
use Shrikeh\Collection\ImmutableCollectionTrait;
use Shrikeh\Collection\ClosedOuterIteratorTrait;
use Shrikeh\Collection\OuterIteratorTrait;
use Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

class Resource extends IteratorIterator implements Collection, Hydrator
{
    use NamedConstructorsTrait;
    use ObjectStorageTrait;
    use ImmutableCollectionTrait;
    use ClosedOuterIteratorTrait;
    use OuterIteratorTrait;
    use ThrowImmutable {
        ThrowImmutable::throwImmutable insteadof ImmutableCollectionTrait;
    }

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
