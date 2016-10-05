<?php

namespace Shrikeh\PagerDuty\Parser\OnCall;

use Psr\Http\Message\ResponseInterface;

use Shrikeh\PagerDuty\Entity\OnCall\OnCall;
use Shrikeh\PagerDuty\Entity\EscalationPolicy\EscalationPolicy;
use Shrikeh\PagerDuty\Collection\OnCalls as OnCallsCollection;
use Shrikeh\PagerDuty\Decoder\Json;
use Shrikeh\PagerDuty\Parser\OnCall as OnCallInterface;

final class OnCallParser implements OnCallInterface
{
    private $decoder;

    public function __construct(Json $decoder)
    {
        $this->decoder = $decoder;
    }

    public function parseResponse(ResponseInterface $response)
    {
        $dto = $this->decoder->decode($response->getBody());
        $policies = [];
        foreach ($dto->oncalls as $entry) {
          $policy = new EscalationPolicy($entry->escalation_policy);
          $user   = $entry->user;
          $level  = $entry->escalation_level;
          $entries[] =  new OnCall($policy, $user, $level);
        }
        return new OnCallsCollection($entries);
    }
}
