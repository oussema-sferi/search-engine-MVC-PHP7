<?php


namespace Entities;

use ArrayObject;

class SearchQuery
{
    private int $id;
    private string $queryContent;
    private ArrayObject $criteria;

    /**
     * SearchQuery constructor.
     * @param int $id
     * @param string $queryContent
     * @param ArrayObject $criteria
     */
    public function __construct(int $id, string $queryContent, ArrayObject $criteria)
    {
        $this->id = $id;
        $this->queryContent = $queryContent;
        $this->criteria = $criteria;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getQueryContent(): string
    {
        return $this->queryContent;
    }

    /**
     * @param string $queryContent
     */
    public function setQueryContent(string $queryContent): void
    {
        $this->queryContent = $queryContent;
    }

    /**
     * @return ArrayObject
     */
    public function getCriteria(): ArrayObject
    {
        return $this->criteria;
    }

    /**
     * @param ArrayObject $criteria
     */
    public function setCriteria(ArrayObject $criteria): void
    {
        $this->criteria = $criteria;
    }


}