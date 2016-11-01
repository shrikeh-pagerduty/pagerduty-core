<?php

namespace Shrikeh\PagerDuty\Repository\Users;

use Shrikeh\PagerDuty\Client;
use Shrikeh\PagerDuty\Repository\Users as UsersRepositoryInterface;
use Shrikeh\PagerDuty\Collection\Users as UserCollection;
use GuzzleHttp\Psr7\Uri;

use Shrikeh\PagerDuty\Hydrator;

final class Users implements UsersRepositoryInterface
{
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
        $request = new Request(
            'GET',
            sprintf('%s/%s', static::ENDPOINT, $id),
            ['query' => $this->query($extras)]
        );
        return $this->collection($this->client->send($request));
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

    private function collection(Promise $promise)
    {
        $callback = new Callback(
            $promise,
            $this->parser
        );

        return new UsersCollection($callback);
    }
}
