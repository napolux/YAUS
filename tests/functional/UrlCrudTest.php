<?php
namespace YAUS\Tests;

require 'vendor/autoload.php';


/**
 * This is the URL CRUD test.
 * We'll add, remove and edit links.
 * Class ShortenerTest
 * @package YAUS\Tests
 */
class UrlCrudTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {

    }

    public function insertUrlTest($url) {

    }

    /**
     * @dataProvider urlsProvider
     */

    public function urlsProvider() {
        return [
            ["https://www.test1.com"],
            ["https://www.test2.com"],
            ["https://www.test3.com"],
            ["https://www.test4.com"],
            ["https://www.test5.com"]
        ];
    }
}
