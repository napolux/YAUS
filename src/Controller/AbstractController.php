<?php
namespace YAUS\Controller;

use Slim\Views\Twig as TwigViews;

abstract class AbstractController
{
    protected $view;
    protected $resources;

    public function __construct(TwigViews $view = null, $resources) {
        $this->view      = $view;
        $this->resources = $resources;
    }
}
