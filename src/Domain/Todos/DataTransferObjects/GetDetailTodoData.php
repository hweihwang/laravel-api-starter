<?php

namespace Domain\Todos\DataTransferObjects;

class GetDetailTodoData
{
    /**
     * @var int
     */
    public int $id;

    /**
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     *
     * @param int $id
     * @return GetDetailTodoData
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
