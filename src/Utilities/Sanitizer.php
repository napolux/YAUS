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
     * @todo This can be safer!!!
     * @param $url
     * @return mixed
     */
    public function sanitizeUrl($url)
    {
        $url = str_replace('../', '', $url);
        $url = str_replace('javascript:', '', $url);
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}