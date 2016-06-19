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

    public function testInsertUrl()
    {
        // This url is already in the system, but we should just get a duplicated url.
        $response = $this->client->request('POST', '/urls/add', [
            'form_params' => [
                'url' => 'https://www.google.com',
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
