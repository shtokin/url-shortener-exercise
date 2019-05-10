<?php

namespace Tests\Unit;

use App\Services\ShortenerService;
use Tests\TestCase;

class ShortenerServiceTest extends TestCase
{

    /**
     * Test short url format
     *
     * @throws \Exception
     */
    public function testGetShortFormat()
    {
        $shortener = new ShortenerService('https://testurl.com');
        $short = $shortener->getShort();
        $this->assertRegExp('/^[a-zA-Z]+$/', $short);
    }

    /**
     * Test short url length
     *
     * @throws \Exception
     */
    public function testGetShortLength()
    {
        $shortener = new ShortenerService('https://testurl.com');
        $short = $shortener->getShort();
        $this->assertTrue(strlen($short) == 6);
    }
}
