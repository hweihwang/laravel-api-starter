<?php

namespace Domain\TodoCQRS\Query;

use Domain\TodoCQRS\DataTransferObjects\DTO;

abstract class Query
{
    public DTO $dTO;

    /**
     * @comment Command constructor.
     * @param DTO $dTO
     */
    public function __construct(DTO $dTO)
    {
        $this->dTO = $dTO;
    }
}
