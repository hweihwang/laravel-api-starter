<?php

namespace Domain\Todos\DataTransferObjects;

class UpdateTodoData
{
    private int $id;

    private string $title;

    private string $content;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param int $id
     * @return UpdateTodoData
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $title
     * @return UpdateTodoData
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $content
     * @return UpdateTodoData
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
