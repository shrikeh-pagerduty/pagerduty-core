<?php

namespace Shrikeh\PagerDuty\Collection;

use FilterIterator;
use Shrikeh\PagerDuty\Collection;
use Shrikeh\PagerDuty\Entity\ContactMethod;
use Shrikeh\PagerDuty\Entity\ContactMethod\Method\Blacklistable;

final class ContactMethods extends FilterIterator implements Collection
{
    use \Shrikeh\PagerDuty\Collection\Traits\ImmutableCollection;

    public static function mergeFrom(Collection ...$its)
    {
        $merge = new \AppendIterator();
        foreach ($its as $it) {
            $merge->append($it);
        }
        return new static($merge);
    }


    private function append(ContactMethod $method)
    {
        $this->getStorage()->attach($method);
    }

    public function accept()
    {
        return (!$this->isBlacklisted($this->getStorage()->current()));
    }

    public function filterByMethod($method, $excludeBlacklisted = true)
    {
        $methods = [];
        foreach ($this->getStorage() as $contactMethod) {
            if ($contactMethod->method() == $method) {
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
