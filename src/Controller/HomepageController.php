<?php
namespace YAUS\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use YAUS\Utilities as Utilities;
use YAUS\Entity as Entity;

/**
 * Class HomepageController
 * @package YAUS\Controller
 */
class HomepageController extends AbstractController
{
    /** @var  Utilities\Sanitizer() */
    private $sanitizer;

    public function hp(Request $request, Response $response, $args)
    {
        $body = $this->view->fetch('website/pages/homepage.twig', [
            'message'     => $this->resources['flash']->getMessage('result')
        ]);
        return $response->write($body);
    }

    /**
     * Adding an URL, with duplicate exception management
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return static
     * @throws \Exception
     */
    public function addUrl(Request $request, Response $response, $args)
    {
        if (!$this->sanitizer) {
            $this->sanitizer = new Utilities\Sanitizer();
        }

        $params = $request->getParams();

        try {
            // Just a little bit of safety, can be improved
            $params['url'] = $this->sanitizer->sanitizeUrl($params['url']);

            if (empty($params['url'])) {
                throw new \Exception('Missing or invalid form data');
            }

            // Adding hash for unique URLs
            $params['hash'] = md5($params['url']);

            /** @var \YAUS\Resource\UrlResource $urlRes */
            $urlRes = $this->resources['urls'];
            $entity = $urlRes->add(new Entity\Url(), $params);
        } catch (\Exception $e) {
            $this->resources['flash']->addMessage('result', 'Url "'. $params['url'] . '" cannot be added. ' . $e->getMessage());
        }

        // Set flash message for url
        $this->resources['flash']->addMessage('result', 'Url "'. $params['url'] . '" added with short url: ' . $this->getHostWithShortRoute() . $entity->getShortUrl());

        // Redirect
        return $response->withStatus(302)
            ->withHeader('Location', '/');
    }

    private function getHostWithShortRoute()
    {
        if (isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . '/u/';
    }

}

