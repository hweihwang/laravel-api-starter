<?php

namespace Domain\TodoCQRS\Transitions;

use Domain\Todos\Models\Todo;
use Domain\Todos\States\PendingTodoStatusState;
use Domain\Todos\States\StartedTodoStatusState;
use Domain\Todos\States\TodoStatusState;

class ToStartedTransition extends TodoTransition
{
    protected array $allowedStates = [
        PendingTodoStatusState::class,
    ];

    public function __construct()
    {
        $this->state = new StartedTodoStatusState;
    }

    public function __invoke(Todo $todo): Todo
    {
        $this->validate($todo);

        $todo->status = $this->state;

        $todo->save();

        //Started logic, side effects, etc.

        return $todo;
    }
}
