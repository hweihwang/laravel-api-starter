<?php

namespace Domain\TodoCQRS\Command;

class CreateTodoCommand extends Command
{
    public string $command = 'CREATE_TODO';
}
