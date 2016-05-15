<?php

namespace YAUS\Resource;

use YAUS\Utilities as Utilities;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Url Resource
 * @package YAUS
 */
class UrlResource extends AbstractResource implements ResourceInterface
{
    private $shortener;

    /**
     * AbstractResource class is there for your use, if you need it for further entities
     * We want to use \YAUS\Shortener\Shortener() here!
     * @param EntityManager $entityManager
     * @param EntityRepository $repository
     */
    public function __construct(EntityManager $entityManager, EntityRepository $repository) {
        parent::__construct($entityManager, $repository);
        $this->shortener = new Utilities\Shortener();
    }

    /**
     * Adding URL to our database, then we'll set the slug,
     * it can be probably be improved, let's see if I come up with a better idea
     * @param $entity
     * @param $params
     * @return mixed
     */
    public function add($entity, $params) {
        parent::add($entity, $params);
        $this->setShortUrl($entity);
        return $entity;
    }

    /**
     * Modifing an url doesn't change is slug. Is it a good behaviour?
     * @param $entity
     * @param $params
     * @return mixed
     */
    public function edit($entity, $params) {
        parent::edit($entity, $params);
        $this->setShortUrl($entity);
        return $entity;
    }

    /**
     * The entity ID will be used to define the "slug" for the shortened url
     * The entity is then saved with the slug
     * @param $entity
     * @return mixed
     */
    private function setShortUrl($entity) {
        $id = $entity->getId();
        $entity->setShortUrl($this->shortener->encode($id));
        $this->entityManager->merge($entity);
        $this->entityManager->flush();
        return $entity;
    }
}