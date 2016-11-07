<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod;

use Psr\Http\Message\UriInterface;
use Shrikeh\PagerDuty\Entity\ContactMethod as ContactMethodInterface;

final class ContactMethod implements ContactMethodInterface
{
    private $method;

    private $self;

    private $summary;

    private $label;

    public static function fromApi(
        Method $method,
        UriInterface $self,
        $summary,
        $label
    ) {
        return new static(
            $method,
            $summary,
            $label,
            $self
        );
    }

    private function __construct(
        Method $method,
        $summary,
        $label,
        UriInterface $self = null
    ) {
        $this->resource = $method;
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
