<?php

namespace Domain\TodoCQRS\EventHandler;

use Domain\TodoCQRS\Models\Todo\Todo;

class CreateTodoEventHandler extends EventHandler
{
    /**
     * @return Todo
     */
    public function handle(): Todo
    {
        return Todo::create([
            'title' => $this->dTO->getTitle(),
            'content' => $this->dTO->getContent(),
        ]);
    }
}
