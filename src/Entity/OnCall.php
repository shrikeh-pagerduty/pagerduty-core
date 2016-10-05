<?php

namespace Shrikeh\PagerDuty\Entity;

interface OnCall
{
    public function level();

    public function escalationPolicy();

    public function user();
}
