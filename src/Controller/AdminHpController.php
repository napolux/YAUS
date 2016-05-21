<?php
namespace YAUS\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

use YAUS\Utilities as Utilities;
use YAUS\Entity as Entity;

/**
 * Class AdminHpController
 * @package YAUS\Controller
 */
class AdminHpController extends AbstractAdminController
{
    /**
     * Listing all the URLs, paginated
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     * @throws \Exception
     */
    public function homepage(Request $request, Response $response, $args)
    {
        /** @var \YAUS\Resource\UrlResource $urlRes */
        $urlRes = $this->resources['urls'];

        $body = $this->view->fetch('admin/pages/homepage.twig', [
            'title'       => 'Admin Homepage',
            'urls'        => $urlRes->getPage(1),
        ]);

        return $response->write($body);
    }
}

