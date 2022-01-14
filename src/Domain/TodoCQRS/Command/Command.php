<?php

namespace Domain\TodoCQRS\Command;

use Domain\TodoCQRS\DataTransferObjects\DTO;

abstract class Command
{
    public string $command = '';

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
