<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod;

use Psr\Http\Message\UriInterface;
use Shrikeh\PagerDuty\Entity\ContactMethod as ContactMethodInterface;

final class ContactMethod implements ContactMethodInterface
{
    private $resource;

    private $self;

    private $summary;

    private $label;

    public static function fromApi(
        Resource $resource,
        UriInterface $self,
        $summary,
        $label
    ) {
        return new static(
            $resource,
            $summary,
            $label,
            $self
        );
    }

    private function __construct(
        Resource $resource,
        $summary,
        $label,
        UriInterface $self = null
    ) {
        $this->resource = $resource;
        $this->self = $self;
        $this->summary = $summary;
    }

    public function __toString()
    {
        return (string) $this->resource();
    }

    public function method()
    {
        return $this->resource()->type();
    }

    public function resource()
    {
        return $this->resource;
    }

    public function summary()
    {
        return $this->summary;
    }

    public function self()
    {
        return $this->self;
    }

    public function label()
    {
        return $this->label;
    }

    public function blacklisted()
    {
        return $this->blacklisted;
    }
}
