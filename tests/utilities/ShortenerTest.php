<?php
namespace YAUS\Tests;

require 'vendor/autoload.php';

/**
 * This is the first stub for the URL shortener class test.
 * Class ShortenerTest
 * @package YAUS\Tests
 */
class ShortenerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \YAUS\Utilities\Shortener() */
    private $shortener;

    public function setUp() {
        $this->shortener = new \YAUS\Utilities\Shortener();
    }

    /**
     * @dataProvider idProvider
     */
    public function testEncode($id = 0)
    {
        $correctValues = [
            1 => 'a',
            2 => 'b',
            3 => 'c',
            4 => 'd',
            5 => 'e',
           37 => 'aa',
           73 => 'ba',
        ];

        $this->assertEquals($this->shortener->encode($id), $correctValues[$id], "Failing in encoding for {$id}");
    }

    /**
     * @dataProvider shortUrlProvider
     */
    public function testDecode($shortUrl) {

        $correctValues = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
            'd' => 4,
            'e' => 5,
            'aa'=> 37,
            'ba'=> 73
        ];

        $this->assertEquals($this->shortener->decode($shortUrl), $correctValues[$shortUrl], "Failing in decoding for {$shortUrl}");

    }

    public function idProvider() {
        return [
            [1],[2],[3],[4],[5],[37],[73]
        ];
    }

    public function shortUrlProvider() {
        return [
            ["a"],["b"],["c"],["d"],["e"],["aa"],["ba"]
        ];
    }
}
