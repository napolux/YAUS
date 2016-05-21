<?php
namespace YAUS\Tests;

require 'vendor/autoload.php';


/**
 * This is the first stub for the URL sanitizer class test.
 * Class SanitizerTest
 * @package YAUS\Tests
 */
class SanitizerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \YAUS\Utilities\Sanitizer() */
    private $sanitizer;

    public function setUp()
    {
        $this->sanitizer = new \YAUS\Utilities\Sanitizer();
    }

    /**
     * @dataProvider urlsProvider
     */
    public function testSanitize($url = '')
    {
        $correctValues = [
            "http://www.napolux.com/../../../../../../../../etc/passwd" => "http://www.napolux.com/etc/passwd",
            "http://www.napolux.com/javascript:alert('hello')" => "http://www.napolux.com/alert('hello')",
            "javascript:alert('hello')" => false
        ];

        $this->assertEquals($this->sanitizer->sanitizeUrl($url), $correctValues[$url], "Failing sanitizing {$url}");
    }

     public function urlsProvider()
     {
        return [
            ["http://www.napolux.com/../../../../../../../../etc/passwd"],
            ["http://www.napolux.com/javascript:alert('hello')"],
            ["javascript:alert('hello')"],
        ];
    }
}
