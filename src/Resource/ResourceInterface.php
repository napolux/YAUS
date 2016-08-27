<?php

namespace YAUS\Resource;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

interface ResourceInterface
{
    /**
     * @param EntityManager $entityManager
     * @param EntityRepository $repository
     */
    public function __construct(EntityManager $entityManager, EntityRepository $repository);

    /**
     * @param array $searchby
     * @return mixed
     */
    public function get($searchby = []);

    /**
     * @param $page
     * @param $pageSize
     * @return mixed
     */
    public function getPage($page, $pageSize);

    /**
     * @param $pageSize
     * @return mixed
     */
    public function getTotalPages($pageSize);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $entity
     * @param $params
     * @return mixed
     */
    public function add($entity, $params);

    /**
     * @param $entity
     * @param $params
     * @return mixed
     */
    public function edit($entity, $params);

    /**
     * @return mixed
     */
    public function getSearchField();
}
