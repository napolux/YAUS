<?php

namespace YAUS\Resource;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

interface ResourceInterface
{
    public function __construct(EntityManager $entityManager, EntityRepository $repository);

    public function get($searchby = []);
    public function getPage($page, $pageSize);
    public function getTotalPages($pageSize);

    public function delete($id);

    public function add($entity, $params);

    public function edit($entity, $params);

    public function getSearchField();
}
