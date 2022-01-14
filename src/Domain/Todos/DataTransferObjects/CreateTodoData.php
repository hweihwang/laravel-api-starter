<?php

namespace Domain\Todos\DataTransferObjects;

class CreateTodoData
{
    private string $title;

    private string $content;

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
     * @param string $title
     * @return CreateTodoData
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $content
     * @return CreateTodoData
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
