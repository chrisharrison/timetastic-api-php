<?php

namespace ChrisHarrison\TimetasticAPI;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    public function getDepartment(string $id) : ResponseInterface;
    public function getDepartments() : ResponseInterface;

    public function getHoliday(string $id) : ResponseInterface;
    public function getHolidays(array $parameters) : ResponseInterface;
    public function createHoliday(array $parameters) : ResponseInterface;
    public function updateHoliday(string $id, array $parameters) : ResponseInterface;

    public function getLeaveType(string $id) : ResponseInterface;
    public function getLeaveTypes() : ResponseInterface;

    public function getPublicHoliday(string $id) : ResponseInterface;
    public function getPublicHolidays(array $parameters) : ResponseInterface;

    public function getUser(string $id) : ResponseInterface;
    public function getUsers(array $parameters) : ResponseInterface;
}
