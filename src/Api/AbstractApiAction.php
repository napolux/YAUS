<?php
namespace YAUS\Api;

use YAUS\Resource\ResourceInterface;
use Slim\Http\Request;
use Slim\Http\Response;

abstract class AbstractApiAction
{
    private $resource;

    public function __construct(ResourceInterface $resource)
    {
        $this->resource = $resource;
    }

    public function fetchAll(Request $request, Response $response, $args)
    {
        $elements = $this->resource->get();
        return $response->withJSON($elements);
    }

    public function fetchOne(Request $request, Response $response, $args)
    {
        $element = $this->resource->get($args['searchby']);
        if ($element) {
            return $response->withJSON($element);
        }
        return $response->withStatus(404, 'No element found for your search criteria.');
    }

    public function fetchPaginated(Request $request, Response $response, $args)
    {
        $elements = $this->resource->getPage($args['page'], $args['pageSize']);
        return $response->withJSON($elements);
    }

    public function addOne(Request $request, Response $response, $args) {
        // adding a new URL to be shortened via API
    }
}

