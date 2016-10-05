<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod\Resource;

use Shrikeh\PagerDuty\Entity\ContactMethod\Resource;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Blacklisted;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Blacklistable;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource\Type;

final class Phone implements Resource, Blacklistable
{
    use Type;
    use Blacklisted;

    private $countryCode;

    private $number;

    public function __construct(
        $number,
        $countryCode,
        $blacklisted = false
    ) {
        $this->number = $number;
        $this->countryCode = $countryCode;
        $this->blacklisted = $blacklisted;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function countryCode()
    {
        return $this->countryCode;
    }

    public function number()
    {
        return $this->number;
    }

    public function render($prependCountryCode = true)
    {
        if ($prependCountryCode) {
            return sprintf('+%d%d', $this->countryCode, $this->number);
        }
        return $this->number;
    }
}
