<?php

namespace ChrisHarrison\TimetasticAPI;

use Psr\Http\Message\ResponseInterface;

class Client implements ClientInterface
{
    private const MILLISECONDS_BETWEEN_REQUESTS = 210;

    private $httpClient;
    private $lastRequestTime;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->lastRequestTime = 0;
    }

    public function getDepartment(string $id) : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement getDepartment() method.
    }

    public function getDepartments() : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement getDepartments() method.
    }

    public function getHoliday(string $id) : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement getHoliday() method.
    }

    public function getHolidays(array $parameters) : ResponseInterface
    {
        $this->rateLimit();
        return $this->httpClient->get('api/holidays', $parameters);
    }

    public function createHoliday(array $parameters) : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement createHoliday() method.
    }

    public function updateHoliday(string $id, array $parameters) : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement updateHoliday() method.
    }

    public function getLeaveType(string $id) : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement getLeaveType() method.
    }

    public function getLeaveTypes() : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement getLeaveTypes() method.
    }

    public function getPublicHoliday(string $id) : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement getPublicHoliday() method.
    }

    public function getPublicHolidays(array $parameters) : ResponseInterface
    {
        $this->rateLimit();
        // TODO: Implement getPublicHolidays() method.
    }

    public function getUser(string $id) : ResponseInterface
    {
        $this->rateLimit();
        return $this->httpClient->get('/api/users/' . $id);
    }

    public function getUsers(array $parameters) : ResponseInterface
    {
        $this->rateLimit();
        return $this->httpClient->get('/api/users', $parameters);
    }

    private function rateLimit()
    {
        $now = $this->milliseconds();
        $millisecondsSinceLastRequest = $now - $this->lastRequestTime;

        if ($millisecondsSinceLastRequest < self::MILLISECONDS_BETWEEN_REQUESTS) {
            $timeToWait = self::MILLISECONDS_BETWEEN_REQUESTS - $millisecondsSinceLastRequest;
            usleep($timeToWait * 1000);
        }

        $this->lastRequestTime = $this->milliseconds();
    }

    private function milliseconds()
    {
        return round(microtime(true) * 1000);
    }
}
