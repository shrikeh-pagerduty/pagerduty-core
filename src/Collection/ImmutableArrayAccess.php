<?php
namespace Shrikeh\PagerDuty\Collection;

use Shrikeh\PagerDuty\Collection\Exception\ImmutableCollectionException;

trait ImmutableArrayAccess
{
    public function offsetSet($offset, $data) {
        $msg = 'Collection %s is immutable and values cannot be set';
        throw new ImmutableCollectionException(
            sprintf($msg, static::class)
        );
    }

    public function offsetUnset($offset) {
      $msg = 'Collection %s is immutable and values cannot be unset';
      throw new ImmutableCollectionException(
          sprintf($msg, static::class)
      );
    }
}
