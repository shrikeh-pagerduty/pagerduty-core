<?php

namespace Shrikeh\PagerDuty\Hydrator\ContactMethod;


use stdClass;
use IteratorIterator;
use SplObjectStorage;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Collection\ImmutableCollection;

class Resource extends IteratorIterator implements Collection, Hydrator
{
    use ImmutableCollection;

    private $hydrators;

    public function __construct(array $resourceHydrators = array())
    {
        parent::__construct(new SplObjectStorage());
        foreach ($resourceHydrators as $hydrator) {
            $this->addHydrator($hydrator);
        }
        $this->getInnerIterator()->rewind();
    }

    public function hydrate(stdClass $dto)
    {
        if (isset($dto->type)) {
            foreach ($this->getInnerIterator() as $hydrator) {
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

    private function addHydrator(Hydrator $hydrator)
    {
        $this->getInnerIterator()->attach($hydrator);
    }
}
