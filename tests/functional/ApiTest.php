<?php
namespace YAUS\Tests;

use GuzzleHttp;

require 'vendor/autoload.php';

/**
 * This is the API test.
 * APIs are pretty simple and can just read from the database.
 * Class ApiTest
 * @package YAUS\Tests
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{
    protected $client;

    /**
     * Setup of client for API
     */
    protected function setUp()
    {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost:8080'
        ]);
    }

    /**
     * Get URLs
     */
    public function testGetUrls()
    {
        $data = $this->makeRequestCheckStatusAndReturnData('/api/urls');
        $this->assertEquals(5, count($data), 'Size of URL array is not what expected');
    }

    /**
     * Getting one URL: checking data against fixtures
     */
    public function testGetSpecificUrl()
    {
        $data = $this->makeRequestCheckStatusAndReturnData('/api/urls/1');
        $this->assertEquals($data['id'], 1, 'Wrong ID returned');
        $this->assertEquals($data['url'], 'https://www.google.com', 'Wrong URL returned');
        $this->assertEquals($data['shortUrl'], 'a', 'Wrong shortUrl returned');
        $this->assertEquals($data['visits'], 0, 'Wrong ID returned');
        $this->assertEquals($data['hash'], '8ffdefbdec956b595d257f0aaeefd623', 'Wrong hash returned');
    }

    /**
     * Pagination check. Pages for API should work as expected
     */
    public function testPagination()
    {
        // First page
        $data = $this->makeRequestCheckStatusAndReturnData('/api/urls/page/1/3');
        $this->assertEquals(3, count($data), 'Wrong page size for first page');

        // Second page (5 urls in fixtures, 2 items in second page)
        $data = $this->makeRequestCheckStatusAndReturnData('/api/urls/page/2/3');
        $this->assertEquals(2, count($data), 'Wrong page size for second page');

        // Third page (5 urls in fixtures, 0 items in third page)
        $data = $this->makeRequestCheckStatusAndReturnData('/api/urls/page/3/3');
        $this->assertEquals(0, count($data), 'Wrong page size for third page');

        // A different page size
        $data = $this->makeRequestCheckStatusAndReturnData('/api/urls/page/1/5');
        $this->assertEquals(5, count($data), 'The page should contain 5 items');

        // Big pagesize, no errors
        $data = $this->makeRequestCheckStatusAndReturnData('/api/urls/page/1/100');
        $this->assertEquals(5, count($data), 'The page should contain 5 items');
    }

    public function testJsonForUrl() {
        $data = $this->makeRequestCheckStatusAndReturnData('/u/a/json');
        $this->assertEquals($data['id'], 1, 'Wrong ID returned');
        $this->assertEquals($data['url'], 'https://www.google.com', 'Wrong URL returned');
        $this->assertEquals($data['shortUrl'], 'a', 'Wrong shortUrl returned');
        $this->assertEquals($data['visits'], 0, 'Wrong ID returned');
        $this->assertEquals($data['hash'], '8ffdefbdec956b595d257f0aaeefd623', 'Wrong hash returned');
    }

    /**
     * Making request, checking status and returning data as array
     * @param $path
     * @return array
     */
    private function makeRequestCheckStatusAndReturnData($path)
    {
        $response = $this->client->get($path);
        $this->assertContains('application/json', $response->getHeader('content-type')[0], 'Not a JSON response');
        $this->assertEquals(200, $response->getStatusCode());
        return json_decode($response->getBody(), true);
    }
}
