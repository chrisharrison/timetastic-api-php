<?php

namespace ChrisHarrison\TimetasticAPI;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

class HttpClient implements HttpClientInterface
{
    private $token;
    private $guzzle;

    public function __construct(string $token, ?string $baseUri = 'https://app.timetastic.co.uk:443', ?GuzzleClientInterface $guzzle = null)
    {
        $this->token = $token;

        if ($guzzle !== null) {
            $this->guzzle = $guzzle;
            return;
        }

        $this->guzzle = new GuzzleClient([
            'base_uri' => $baseUri
        ]);
    }

    public function get(string $uri, array $parameters = []) : ResponseInterface
    {
        return $this->call(new Verb('get'), $uri, $parameters);
    }

    public function post(string $uri, array $parameters = []) : ResponseInterface
    {
        return $this->call(new Verb('post'), $uri, $parameters);
    }

    private function call(Verb $method, string $uri, array $parameters = []) : ResponseInterface
    {
        $processedParameters = [];

        $processedParameters['headers'] = [
            'Authorization' => 'Bearer ' . $this->token
        ];

        if ((string) $method === 'GET') {
            $processedParameters['query'] = $parameters;
        } elseif ((string) $method = 'POST') {
            $processedParameters['form_params'] = $parameters;
        }

        return $this->guzzle->request((string) $method, $uri, $processedParameters);
    }
}
