<?php

namespace Shrikeh\PagerDuty\Entity\User;

use Shrikeh\PagerDuty\Entity\User as UserInterface;

use Psr\Http\Message\UriInterface;
use Shrikeh\PagerDuty\Collection;

final class User implements UserInterface
{
    private $contactMethods;

    private $self;

    private $name;

    private $email;

    private $summary;

    public static function fromData(
        Collection $contactMethods,
        UriInterface $self,
        $name,
        $email,
        $summary
    ) {
        return new static(
            $contactMethods,
            $name,
            $email,
            $summary,
            $self
        );
    }

    public function contactMethods()
    {
        return $this->contactMethods;
    }

    private function __construct(
        Collection $contactMethods,
        $name,
        $email,
        $summary,
        UriInterface $self = null
    )
    {
        $this->contactMethods = $contactMethods;
        $this->name           = $name;
        $this->email          = $email;
        $this->summary        = $summary;
        $this->self           = $self;
    }
}
