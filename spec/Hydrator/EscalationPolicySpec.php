<?php

namespace spec\Shrikeh\PagerDuty\Hydrator;

use Shrikeh\PagerDuty\Hydrator\EscalationPolicy;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EscalationPolicySpec extends ObjectBehavior
{

    function it_creates_an_escalation_policy_from_an_stdClass(
        \stdClass $dto
    ) {
        $dto->id = 'PND71Y2';
        $dto->type = 'type';
        $dto->summary = 'AWS BoothDuty';
        $dto->self = 'https://api.pagerduty.com/escalation_policies/PND71Y2';
        $dto->html_url = 'https://webdemo.pagerduty.com/escalation_policies/PND71Y2';

        $this->fromStdClass($dto)->shouldHaveType('Shrikeh\PagerDuty\Entity\EscalationPolicy');
    }

}
