<?php


namespace Entities;


class Category
{
    private int $id;
    private string $label;

    /**
     * Category constructor.
     * @param string $label
     */
    public function __construct(string $label)
    {
        $this->label = $label;
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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }


}