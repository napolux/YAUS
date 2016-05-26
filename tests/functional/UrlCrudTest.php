<?php
namespace YAUS\Tests;

use GuzzleHttp;

require 'vendor/autoload.php';


/**
 * This is the URL CRUD test.
 * We'll visit, add, remove and edit links.
 * Class UrlCrudTest
 * @package YAUS\Tests
 */
class UrlCrudTest extends \PHPUnit_Framework_TestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost:8080'
        ]);
    }

    public function testUrlRedirect() {
        $response = $this->client->request('GET', '/u/a', [
            'allow_redirects' => false
        ]);
        $this->assertEquals(301, $response->getStatusCode());
        $this->assertEquals('https://www.google.com', $response->getHeader('location')[0]);
    }

    /**
     * @dataProvider urlsProvider
     */
    public function testInsertUrl($url)
    {
        $this->assertTrue(true);
    }



    public function urlsProvider()
    {
        return [
            ["https://www.test1.com"],
            ["https://www.test2.com"],
            ["https://www.test3.com"],
            ["https://www.test4.com"],
            ["https://www.test5.com"]
        ];
    }
}
