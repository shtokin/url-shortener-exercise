<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlControllerTest extends TestCase
{

    private $fullUrl = '';


    protected function setUp() :void
    {
        parent::setUp();
        $this->fullUrl = 'https://testurl.com/' . md5(rand());
    }


    /**
     * Test /myshortener/create endpoint.
     *
     * @return void
     */
    public function testCreate()
    {

        $response = $this->post(
           '/myshortener/create',
            ['full_url' => $this->fullUrl]
        );
        $response->assertSee('Full URL: ' . $this->fullUrl);
        $this->assertDatabaseHas('urls', [
            'full' => $this->fullUrl
        ]);

        \DB::table('urls')->where('full', '=', $this->fullUrl)->delete();
    }

}
