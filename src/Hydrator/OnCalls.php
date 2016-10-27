<?php

namespace Shrikeh\PagerDuty\Hydrator;

use stdClass;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\OnCall\OnCall;
use Shrikeh\PagerDuty\Collection\OnCalls as OnCallsCollection;

final class OnCalls implements Hydrator
{
    private $escalationPolicyHydrator;
    private $userHydrator;

    public function __construct(
        Hydrator $escalationPolicyHydrator,
        Hydrator $userHydrator
    ) {
        $this->escalationPolicyHydrator = $escalationPolicyHydrator;
        $this->userHydrator             = $userHydrator;
    }

    public function hydrate(stdClass $dto)
    {
        return new OnCallsCollection($this->hydrateFromDto($dto));
    }

    public function supports($token)
    {
        return 'oncalls' === $token;
    }

    private function hydrateFromDto(stdClass $dto)
    {
        foreach ($dto->oncalls as $entry) {
            yield new OnCall(
                $this->escalationPolicy($entry),
                $this->user($entry),
                $entry->escalation_level
            );
        }
    }

    private function escalationPolicy(stdClass $dto)
    {
        return $this->escalationPolicyHydrator->hydrate($dto->escalation_policy);
    }

    private function user(stdClass $dto)
    {
        return $this->userHydrator->hydrate($dto->user);
    }
}
