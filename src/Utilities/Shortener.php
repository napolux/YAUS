<?php
namespace YAUS\Utilities;

/**
 * Based on an idea from http://stackoverflow.com/a/8015167/208623
 * Fixed to start @ 1, not at 0.
 * The class will take values like 1, 2, 3 and translate them to a, b, c...
 * Class Shortener
 * @package YAUS\Utilities
 */
class Shortener
{
    // Dictionary can be whatever you want. Just keep in mind you need to be compliant with URL structure
    private $dictionary = "abcdefghijklmnopqrstuvwxyz0123456789";

    public function __construct() {
        $this->dictionary = str_split($this->dictionary);
    }

    /**
     * Given a database id it will convert it to a slug: from 1 to "a"
     * @param $i That's the id of our database record!
     * @return string
     */
    public function encode($i) {
        if ($i == 1) {
            return $this->dictionary[0];
        }

        $result = '';
        $base = count($this->dictionary);

        while ($i > 0) {
            $result[] = $this->dictionary[($i % $base) - 1];
            $i = floor($i / $base);
        }

        $result = array_reverse($result);

        return join("", $result);
    }

    /**
     * Given a string, this will be converted to a database id: from "a" to 1
     * @param $input
     * @return int
     */
    public function decode($input) {
        $i = 0;
        $base = count($this->dictionary);
        $input = str_split($input);

        foreach($input as $char) {
            $pos = array_search($char, $this->dictionary);
            $i = ($i * $base + $pos) + 1;
        }

        return $i;
    }
}