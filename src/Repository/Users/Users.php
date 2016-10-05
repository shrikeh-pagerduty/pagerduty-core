<?php

namespace Shrikeh\PagerDuty\Repository\Users;

use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Repository\Users as UsersRepositoryInterface;
use Shrikeh\PagerDuty\Collection\Users as UserCollection;
use GuzzleHttp\Psr7\Uri;

use Shrikeh\PagerDuty\Hydrator;

final class Users implements UsersRepositoryInterface
{
    const CONTACT_METHODS     = 'contact_methods';
    const NOTIFICATION_RULES  = 'notification_rules';
    const TEAMS               = 'teams';

    private $client;

    private $hydrator;

    public function __construct(
        Client $client,
        Hydrator $hydrator
    ) {
        $this->client   = $client;
        $this->hydrator = $hydrator;
    }

    public function get()
    {

    }

    public function findById($id, array $extras = array())
    {
      $response = $this->client->request(
          'GET',
          sprintf('%s/%s', static::ENDPOINT, $id),
          ['query' => $this->query($extras)]
      );

      $dto = json_decode($response->getBody());
      $users[] = $this->hydrator->hydrate($dto->user);
      return new UserCollection($users);
    }

    private function query(array $extras = array())
    {
        $query = [];
        foreach ($extras as $extra) {
            $query[] = ['include[]' => $extra];
        }
        $newQuery = [];
        foreach ($query as $part) {
          foreach ($part as $key => $value) {
              $newQuery[] = "$key=$value";
          }
        }
        return implode('&', $newQuery);
    }
}
