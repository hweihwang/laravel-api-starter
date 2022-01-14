<?php

namespace Domain\TodoCQRS\EventHandler;

use Domain\TodoCQRS\DataTransferObjects\DTO;

abstract class EventHandler
{
    /**
     * @params DTO
     */
    public function __construct(public DTO $dTO)
    {
    }

    abstract public function handle();
}
