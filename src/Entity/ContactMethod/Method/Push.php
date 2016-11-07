<?php

namespace Shrikeh\PagerDuty\Entity\ContactMethod\Method;

use InvalidArgumentException;
use OutOfBoundsException;

use Shrikeh\PagerDuty\Entity\ContactMethod\Method;
use Shrikeh\PagerDuty\Entity\ContactMethod\Method\Blacklisted;
use Shrikeh\PagerDuty\Entity\ContactMethod\Method\Blacklistable;
use Shrikeh\PagerDuty\Entity\ContactMethod\Method\Type;

final class Push implements Method, Blacklistable
{
    const MAX_ADDRESS_LENGTH = 64;

    use Type;
    use Blacklisted;

    private $address;

    private $deviceType;

    private $sounds;

    public function __construct(
        $address,
        $type,
        $sounds = array(),
        $blacklisted = false
    ) {
        // if (!ctype_xdigit($address)) {
        //     $msg = 'Address must be hexadecimal, but received %s';
        //     throw new \InvalidArgumentException(
        //         sprintf($msg, $address)
        //     );
        // }
        // $length = strlen($address);
        // if ($length > static::MAX_ADDRESS_LENGTH) {
        //     $msg = 'Expected address to be a maximum of %d characters, but was given %d';
        //     throw new OutOfBoundsException(
        //         sprintf($msg, static::MAX_ADDRESS_LENGTH, $length)
        //     );
        // }

        $this->address = $address;
        $this->deviceType = $type;
        $this->sounds = $sounds;
    }

    public function __toString()
    {
        return $this->address();
    }

    public function address()
    {
        return $this->address;
    }

    public function deviceType()
    {
        return $this->deviceType;
    }

    public function sounds()
    {
        return $this->sounds;
    }
}
