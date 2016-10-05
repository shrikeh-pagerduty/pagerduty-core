<?php

namespace spec\Shrikeh\PagerDuty\Hydrator\ContactMethod;

use stdClass;
use Shrikeh\PagerDuty\Hydrator;
use Shrikeh\PagerDuty\Entity\ContactMethod\Resource as ResourceEntity;
use Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResourceSpec extends ObjectBehavior
{
    function let(
        Hydrator $phone,
        Hydrator $email,
        Hydrator $sms,
        Hydrator $push
    ) {
        $this->beConstructedWith([$phone, $email, $sms, $push]);
    }

    function it_returns_true_if_it_supports_the_token()
    {
        $this->supports('type')->shouldReturn(true);
    }

    function it_returns_false_if_it_does_not_support_the_token()
    {
        $this->supports('foo')->shouldReturn(false);
    }

    function it_iterates_over_hydrators(
        stdClass $dto,
        ResourceEntity $entity,
        $phone,
        $email,
        $sms,
        $push
    ) {
        $type = 'phone_contact_method';
        $phone->supports($type)->willReturn(true);
        $email->supports($type)->willReturn(false);
        $sms->supports($type)->willReturn(false);
        $push->supports($type)->willReturn(false);
        $dto->type = $type;
        $phone->hydrate($dto)->willReturn($entity)->shouldBeCalled();
        $this->hydrate($dto)->shouldReturn($entity);
    }
}
