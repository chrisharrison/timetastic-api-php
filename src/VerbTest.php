<?php

namespace ChrisHarrison\TimetasticAPI;

use PHPUnit\Framework\TestCase;

class VerbTest extends TestCase
{
    public function testConstruct()
    {
        $test = new Verb('get');
        $this->assertInstanceOf(Verb::class, $test);

        $this->expectException(\InvalidArgumentException::class);
        $test2 = new Verb('this-is-never-going-to-be-an-http-verb');
    }

    public function testToString()
    {
        $test = new Verb('get');
        $this->assertEquals('GET', (string) $test);
    }
}
