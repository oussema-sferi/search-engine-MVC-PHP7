<?php


namespace Entities;

use Entities\User;


class Client extends User
{
    protected int $queriesNumber;

    /**
     * @return int
     */
    public function getQueriesNumber(): int
    {
        return $this->queriesNumber;
    }

    /**
     * @param int $queriesNumber
     */
    public function setQueriesNumber(int $queriesNumber): void
    {
        $this->queriesNumber = $queriesNumber;
    }


}