<?php

namespace Shrikeh\PagerDuty\Repository;

interface Users
{
    const ENDPOINT = '/users';

    public function get();

    public function findById($id);
}
