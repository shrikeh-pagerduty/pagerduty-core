<?php

require realpath(implode(DIRECTORY_SEPARATOR, [__DIR__, '/../vendor/autoload.php']));


$resourceHydrator = new Shrikeh\PagerDuty\Hydrator\ContactMethod\Resource(new ArrayIterator());
$uriHydrator = new Shrikeh\PagerDuty\Hydrator\Uri\Guzzle();
$contactMethodHydrator = new Shrikeh\PagerDuty\Hydrator\ContactMethod(
    $resourceHydrator,
    $uriHydrator
);

$userHydrator = new Shrikeh\PagerDuty\Hydrator\User($contactMethodHydrator, $uriHydrator);

$escalationPolicyHydrator = new Shrikeh\PagerDuty\Hydrator\EscalationPolicy($uriHydrator);
$onCallsHydrator = new Shrikeh\PagerDuty\Hydrator\OnCalls(
    $escalationPolicyHydrator,
    $userHydrator
);

$jsonDecoder = new Shrikeh\PagerDuty\Decoder\Json\Webmozart(new Webmozart\Json\JsonDecoder());
$onCallsParser = new Shrikeh\PagerDuty\Parser\Response(
    $jsonDecoder,
    $onCallsHydrator
);


$guzzle = new GuzzleHttp\Client([
    'base_uri' => 'https://api.pagerduty.com',
    'headers' => [
        'Authorization' => sprintf(
            'Token token=%s',
            getenv('API_AUTH_TOKEN')
        )
    ]
]);

$client = new Shrikeh\PagerDuty\Client\Guzzle($guzzle);

$oncallRepo = new Shrikeh\PagerDuty\Repository\OnCalls\OnCalls(
    $client,
    $onCallsParser
);

$whoIsOnCall = $oncallRepo->get();

foreach ($whoIsOnCall as $oncall) {
    var_dump($oncall);
}
