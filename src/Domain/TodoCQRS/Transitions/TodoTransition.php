<?php

namespace Domain\TodoCQRS\Transitions;

use Domain\Todos\Models\Todo;
use Domain\Todos\States\TodoStatusState;

abstract class TodoTransition
{
    protected array $allowedStates;

    public TodoStatusState $state;

    abstract public function __invoke(Todo $todo);

    public function validate(Todo $todo): void
    {
        in_array($todo->attributes['status'], $this->allowedStates, true) ||
        throw new \DomainException('Invalid state');
    }
}
