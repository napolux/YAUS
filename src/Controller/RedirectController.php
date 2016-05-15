<?php
namespace YAUS\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig as TwigViews;

use YAUS\Utilities as Utilities;
use YAUS\Entity as Entity;

/**
 * Class RedirectController
 * @package YAUS\Controller
 */
class RedirectController extends AbstractController
{
    private $shortener;

    public function __construct(TwigViews $view = null, $resources) {
        parent::__construct($view, $resources);
        $this->shortener = new Utilities\Shortener();
    }

    public function url(Request $request, Response $response, $args) {

        $urlObj = $this->getUrlObject($args['shortUrl']);

        // Redirect
        return $response->withStatus(301)
            ->withHeader('Location', $urlObj['url']);
    }

    public function urlWithJSON(Request $request, Response $response, $args) {
        $urlObj = $this->getUrlObject($args['shortUrl']);

        // Redirect
        return $response->withJSON($urlObj);

    }

    private function getUrlObject($shortUrl) {
        $urlId = $this->shortener->decode($shortUrl);

        /** @var \YAUS\Resource\UrlResource $urlRes */
        $urlRes = $this->resources['urls'];
        return $urlRes->get($urlId);
    }
}
