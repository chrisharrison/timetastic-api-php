<?php

namespace ChrisHarrison\TimetasticAPI;

use Psr\Http\Message\ResponseInterface;

class Client
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getUser(string $id, array $parameters = []) : ResponseInterface
    {
        return $this->httpClient->get('/api/users/' . $id, $parameters);
    }

    public function getUsers(array $parameters = []) : ResponseInterface
    {
        return $this->httpClient->get('/api/users', $parameters);
    }
}
