<?php

namespace Shrikeh\PagerDuty\Repository;

interface Users
{
    const ENDPOINT = '/users';
    const CONTACT_METHODS     = 'contact_methods';
    const NOTIFICATION_RULES  = 'notification_rules';
    const TEAMS               = 'teams';
    
    public function get();

    public function findById($id);
}
