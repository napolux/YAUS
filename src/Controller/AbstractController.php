<?php
namespace YAUS\Controller;

use Slim\Views\Twig as TwigViews;

/**
 * Class AbstractController
 * @package YAUS\Controller
 */
abstract class AbstractController
{
    /** @var TwigViews $view */
    protected $view;
    protected $resources;

    /**
     * @param TwigViews $view
     * @param $resources
     */
    public function __construct(TwigViews $view, $resources)
    {
        $this->view      = $view;
        $this->resources = $resources;
    }
}
