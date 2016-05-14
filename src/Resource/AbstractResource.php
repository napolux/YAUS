<?php
namespace YAUS\Resource;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class AbstractResource implements ResourceInterface
{
    const DEFAULT_PAGE_SIZE     = 20;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager    = null;

    /** @var EntityRepository  */
    protected $repository       = null;

    public function __construct(EntityManager $entityManager, EntityRepository $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository    = $repository;
    }

    /**
     * @param string|null $searchby
     * @return array
     */
    public function get($searchby = null)
    {
        if (empty($searchby)) {
            $elements = $this->repository->findAll();
            $elements = array_map(
                function ($element) {
                    return $element->getArrayCopy();
                },
                $elements
            );

            return $elements;
        } else {
            $element = $this->repository->findOneBy(
                [$this->getSearchField() => $searchby]
            );
            if ($element) {
                return $element->getArrayCopy();
            }
        }

        return false;
    }

    /**
     * Get items by page
     * @param int $page
     * @param int $pageSize
     * @return array
     * @throws \Exception
     */
    public function getPage($page = 1, $pageSize = self::DEFAULT_PAGE_SIZE) {

        if ((int)$page < 1 || !is_numeric($page)) {
            throw new \Exception('Wrong page number');
        }

        $elements = $this->repository->findBy(
            [],
            [],
            $pageSize,
            ($page - 1) * $pageSize
        );

        $elements = array_map(
            function ($element) {
                return $element->getArrayCopy();
            },
            $elements
        );

        return $elements;
    }

    /**
     * @param int $pageSize
     * @return float
     */
    public function getTotalPages($pageSize = self::DEFAULT_PAGE_SIZE) {
        return ceil(count($this->get()) / $pageSize);
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function delete($id) {

        $element = $this->repository->find($id);

        if (!$element) {
            throw new \Exception('No element found for id '. $id);
        }

        $this->entityManager->remove($element);
        $this->entityManager->flush();
    }

    /**
     * @param $entity
     * @param $params
     */
    public function add($entity, $params) {

        foreach ($params as $k => $v) {
            $entity->{"set" . ucfirst($k)}($v);
        }

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    /**
     * @param $entity
     * @param $params
     */
    public function edit($entity, $params) {

        foreach ($params as $k => $v) {
            $entity->{"set" . ucfirst($k)}($v);
        }

        $this->entityManager->merge($entity);
        $this->entityManager->flush();
    }

    /**
     * @return string
     */
    public function getSearchField() {
        return 'id';
    }
}