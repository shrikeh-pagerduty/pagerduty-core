<?php

namespace Shrikeh\PagerDuty\Collection;

trait ArrayAccess
{
    public function offsetExists($offset) {
        return $this->getInnerIterator()->offsetExists($offset);
    }

    public function offsetGet($offset) {
        return $this->getInnerIterator()->offsetGet($offset);
    }

    public function offsetSet($offset, $data) {
        return $this->getInnerIterator()->offsetSet($offset, $data);
    }

    public function offsetUnset($offset) {
        return $this->getInnerIterator()->offsetUnset($offset);
    }
}
