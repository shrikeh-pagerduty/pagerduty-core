<?php

namespace Shrikeh\PagerDuty\Collection;

use FilterIterator;
use OutOfBoundsException;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\ContactMethod;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Blacklistable;

final class ContactMethods extends FilterIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\ImmutableCollection;

    public function __construct($methods)
    {
        parent::__construct(new \SplObjectStorage());

        foreach ($methods as $method) {
            $this->appendContactMethod($method);
        }
        $this->getInnerIterator()->rewind();
    }

    private function appendContactMethod(ContactMethod $method)
    {
        $this->getInnerIterator()->attach($method);
    }

    public function accept()
    {
        $contactMethod = $this->getInnerIterator()->current();
        if ($contactMethod->resource() instanceof Blacklistable) {
            return (true !== $contactMethod->resource()->blacklisted());
        }
        return true;
    }

    public function filterByResource($resource, $excludeBlacklisted = true)
    {
        $methods = [];
        foreach ($this->getInnerIterator() as $contactMethod) {
          if ($contactMethod->method() == $resource) {
            $methods[] = $contactMethod;
          }
        }
        return new static($methods);
    }
}
