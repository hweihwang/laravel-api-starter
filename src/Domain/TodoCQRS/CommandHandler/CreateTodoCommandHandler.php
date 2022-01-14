<?php

namespace Domain\TodoCQRS\CommandHandler;

use Domain\TodoCQRS\EventHandler\CreateTodoEventHandler;

class CreateTodoCommandHandler extends CommandHandler
{
    /**
     * @throws \JsonException
     */
    public function handle()
    {
        $this->eventHandler = new CreateTodoEventHandler($this->command->dTO);

        $this->createEvent();

        return $this->handleEvent();
    }
}
