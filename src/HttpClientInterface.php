<?php

namespace ChrisHarrison\TimetasticAPI;

use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
    public function get(string $uri, array $parameters = []) : ResponseInterface;
    public function post(string $uri, array $parameters = []) : ResponseInterface;
}
