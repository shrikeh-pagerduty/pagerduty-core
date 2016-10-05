<?php
namespace Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\Collection\ArrayAccess;
use Shrikeh\PagerDuty\Collection\OuterIterator;
use Shrikeh\PagerDuty\Collection\ImmutableArrayAccess;

trait ImmutableCollection
{
    use ArrayAccess;
    use ImmutableArrayAccess
    {
        ImmutableArrayAccess::offsetSet insteadof ArrayAccess;
        ImmutableArrayAccess::offsetUnset insteadof ArrayAccess;
    }
}
