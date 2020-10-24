<?php


namespace Entities;

use ArrayObject;

class SearchQuery
{
    private int $id;
    private string $queryContent;
    private ArrayObject $criterias;

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
    public function getCriterias(): ArrayObject
    {
        return $this->criterias;
    }

    /**
     * @param ArrayObject $criterias
     */
    public function setCriterias(ArrayObject $criterias): void
    {
        $this->criterias = $criterias;
    }


}