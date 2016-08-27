<?php
namespace YAUS\Api;

use YAUS\Resource\ResourceInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class AbstractApiAction
 * @package YAUS\Api
 */
abstract class AbstractApiAction
{
    private $resource;

    /**
     * @param ResourceInterface $resource
     */
    public function __construct(ResourceInterface $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function fetchAll(Request $request, Response $response, $args)
    {
        $elements = $this->resource->get();
        return $response->withJSON($elements);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function fetchOne(Request $request, Response $response, $args)
    {
        $element = $this->resource->get($args['searchby']);
        if ($element) {
            return $response->withJSON($element);
        }
        return $response->withStatus(404, 'No element found for your search criteria.');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function fetchPaginated(Request $request, Response $response, $args)
    {
        $elements = $this->resource->getPage($args['page'], $args['pageSize']);
        return $response->withJSON($elements);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     */
    public function addOne(Request $request, Response $response, $args) {
        // adding one item
    }
}

