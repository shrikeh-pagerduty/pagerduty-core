<?php

namespace spec\Shrikeh\PagerDuty\Hydrator;


use stdClass;
use Shrikeh\PagerDuty\Collection\OnCalls;
use Shrikeh\PagerDuty\Entity\User;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\EscalationPolicy;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OnCallsSpec extends ObjectBehavior
{
    public function getMatchers()
    {
        return [
            'containOnCall' => function(OnCalls $collection, $entity) {
                return ($entity == $collection->current()->user());
            }
        ];
    }

    function it_hydrates_a_collection(
        Hydrator $escalationPolicyHydrator,
        Hydrator $userHydrator,
        EscalationPolicy $policy,
        User $user,
        stdClass $dto,
        stdClass $entryDto
    )
    {
        $entryDto->user = new stdClass;
        $entryDto->escalation_policy = new stdClass;
        $entryDto->escalation_level = 1;
        $dto->oncalls = [$entryDto];

        $escalationPolicyHydrator->hydrate(Argument::type('stdClass'))->willReturn($policy);
        $userHydrator->hydrate(Argument::type('stdClass'))->willReturn($user);

        $this->beConstructedWith($escalationPolicyHydrator, $userHydrator);
        $this->hydrate($dto)->shouldContainOnCall($user);
    }
}
