<?php

namespace Domain\TodoCQRS\CommandHandler;

use Domain\TodoCQRS\Command\Command;
use Domain\TodoCQRS\EventHandler\EventHandler;
use Domain\TodoCQRS\Models\Event\Event;


abstract class CommandHandler
{
    public EventHandler $eventHandler;

    public Command $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    abstract public function handle();

    /**
     * @return Event
     * @throws \JsonException
     */
    public function createEvent(): Event
    {
        return Event::create([
            'event' => $this->command->dTO->toJson(),
            'command' => $this->command->command,
            'status' => 'published',
        ]);
    }

    public function handleEvent()
    {
        return $this->eventHandler->handle();
    }

}
