<?php

namespace ChrisHarrison\TimetasticAPI;

class Verb
{
    private $verb;

    public function __construct(string $verb)
    {
        $allowed = ['get', 'post', 'put', 'delete'];
        if (!in_array($verb, $allowed)) {
            throw new \InvalidArgumentException('An HTTP verb must be one of: ' . implode(', ', $allowed));
        }
        $this->verb = strtoupper($verb);
    }

    public function __toString()
    {
        return $this->verb;
    }
}
