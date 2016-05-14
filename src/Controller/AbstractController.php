<?php
namespace YAUS\Controller;

use Slim\Views\Twig as TwigViews;

abstract class AbstractController
{

    const PUBLIC_FOLDER = 'public';

    protected $view;
    protected $resources;

    public function __construct(TwigViews $view = null, $resources) {
        $this->view      = $view;
        $this->resources = $resources;
    }

    protected function getSlug($str, $replace = [], $delimiter = '-') {
        setlocale(LC_ALL, 'en_US.UTF8');

        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }
}
