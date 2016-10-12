<?php

namespace Shrikeh\PagerDuty\Collection;

use FilterIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\ContactMethod;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Blacklistable;

final class ContactMethods extends FilterIterator implements Collection
{
    use \Shrikeh\Collection\NamedConstructorsTrait;
    use \Shrikeh\Collection\ObjectStorageTrait;
    use \Shrikeh\Collection\ImmutableCollectionTrait;
    use \Shrikeh\Collection\ClosedOuterIteratorTrait;
    use \Shrikeh\Collection\OuterIteratorTrait;
    use \Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

    private function append(ContactMethod $method)
    {
        $this->getStorage()->attach($method);
    }

    public function accept()
    {
        $contactMethod = $this->getStorage()->current();
        if ($contactMethod->resource() instanceof Blacklistable) {
            return (true !== $contactMethod->resource()->blacklisted());
        }
        return true;
    }

    public function filterByResource($resource, $excludeBlacklisted = true)
    {
        $methods = [];
        foreach ($this->getStorage() as $contactMethod) {
          if ($contactMethod->method() == $resource) {
            $methods[] = $contactMethod;
          }
        }
        return static::fromArray($methods);
    }
}
