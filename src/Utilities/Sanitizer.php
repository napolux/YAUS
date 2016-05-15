<?php
/**
 * Created by PhpStorm.
 * User: napolux
 * Date: 15/05/16
 * Time: 10:29
 */

namespace YAUS\Utilities;

class Sanitizer
{
    /**
     * Sanitizing URLs
     * Can be improved, probably
     * @param $url
     * @return mixed
     */
    public function sanitizeUrl($url) {
        return filter_var($url, FILTER_SANITIZE_URL);
    }
}