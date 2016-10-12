<?php

namespace Shrikeh\PagerDuty\Collection;

use FilterIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\ContactMethod;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Blacklistable;

use Shrikeh\Collection\NamedConstructorsTrait;
use Shrikeh\Collection\ObjectStorageTrait;
use Shrikeh\Collection\ImmutableCollectionTrait;
use Shrikeh\Collection\ClosedOuterIteratorTrait;
use Shrikeh\Collection\OuterIteratorTrait;
use Shrikeh\PagerDuty\Collection\Traits\ThrowImmutable;

final class ContactMethods extends FilterIterator implements Collection
{
    use NamedConstructorsTrait;
    use ObjectStorageTrait;
    use ImmutableCollectionTrait;
    use ClosedOuterIteratorTrait;
    use OuterIteratorTrait;
    use ThrowImmutable {
        ThrowImmutable::throwImmutable insteadof ImmutableCollectionTrait;
    }

    private function append(ContactMethod $method)
    {
        $this->getStorage()->attach($method);
    }

    public function accept()
    {
        return (!$this->isBlacklisted($this->getStorage()->current()));
    }

    public function filterByResource($resource, $excludeBlacklisted = true)
    {
        $methods = [];
        foreach ($this->getStorage() as $contactMethod) {
            if ($contactMethod->method() == $resource) {
                $methods[] = $contactMethod;
            }
        }
        if ($excludeBlacklisted) {
            $methods = $this->filterBlacklisted($methods);
        }
        return static::fromArray($methods);
    }

    private function filterBlacklisted($methods) {
        $whitelist = [];
        foreach ($methods as $contactMethod) {
            if (!$this->isBlacklisted($contactMethod)) {
                $whitelist[] = $contactMethod;
            }
        }
        return $whitelist;
    }

    private function isBlacklisted(ContactMethod $contactMethod)
    {
        if ($contactMethod->resource() instanceof Blacklistable) {
            return (true === $contactMethod->resource()->blacklisted());
        }
        return false;
    }
}
