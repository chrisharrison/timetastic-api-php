<?php

namespace ChrisHarrison\TimetasticAPI;

use Psr\Http\Message\ResponseInterface;

class Client implements ClientInterface
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getDepartment(string $id) : ResponseInterface
    {
        // TODO: Implement getDepartment() method.
    }

    public function getDepartments() : ResponseInterface
    {
        // TODO: Implement getDepartments() method.
    }

    public function getHoliday(string $id) : ResponseInterface
    {
        // TODO: Implement getHoliday() method.
    }

    public function getHolidays(array $parameters) : ResponseInterface
    {
        return $this->httpClient->get('api/holidays', $parameters);
    }

    public function createHoliday(array $parameters) : ResponseInterface
    {
        // TODO: Implement createHoliday() method.
    }

    public function updateHoliday(string $id, array $parameters) : ResponseInterface
    {
        // TODO: Implement updateHoliday() method.
    }

    public function getLeaveType(string $id) : ResponseInterface
    {
        // TODO: Implement getLeaveType() method.
    }

    public function getLeaveTypes() : ResponseInterface
    {
        // TODO: Implement getLeaveTypes() method.
    }

    public function getPublicHoliday(string $id) : ResponseInterface
    {
        // TODO: Implement getPublicHoliday() method.
    }

    public function getPublicHolidays(array $parameters) : ResponseInterface
    {
        // TODO: Implement getPublicHolidays() method.
    }

    public function getUser(string $id) : ResponseInterface
    {
        return $this->httpClient->get('/api/users/' . $id);
    }

    public function getUsers(array $parameters) : ResponseInterface
    {
        return $this->httpClient->get('/api/users', $parameters);
    }
}
