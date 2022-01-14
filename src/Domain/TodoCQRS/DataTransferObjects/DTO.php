<?php

namespace Domain\TodoCQRS\DataTransferObjects;

abstract class DTO
{
    abstract public function toArray(): array;

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
