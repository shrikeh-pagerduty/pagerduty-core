<?php

namespace spec\Shrikeh\PagerDuty\Promise;

use GuzzleHttp\Promise\PromiseInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleSpec extends ObjectBehavior
{
    function it_calls_a_fulfilled_callable(PromiseInterface $promise)
    {
        $this->beConstructedWith($promise);
        $string = 'fulfilled';
        $fulfilled = function() use ($string) { return $string; };
        $unwrap = false;
        $promise->then($fulfilled, null)->shouldBeCalled();
        $promise->wait($unwrap)->willReturn($string);
        $this->then($fulfilled);
        $this->wait($unwrap)->shouldReturn($string);
    }

    function it_calls_an_unfulfilled_callable(PromiseInterface $promise)
    {
        $this->beConstructedWith($promise);
        $unfulfilledString = 'unfulfilled';
        $fulfilled = function() {  };
        $unfulfilled = function() use ($unfulfilledString) { return $unfulfilledString; };
        $promise->then($fulfilled, $unfulfilled)->shouldBeCalled();
        $promise->wait(Argument::any())->willReturn($unfulfilledString);
        $this->then($fulfilled, $unfulfilled);
        $this->wait()->shouldReturn($unfulfilledString);
    }
}
