<?php

namespace Domain\TodoCQRS\Transitions;

use Domain\Todos\Models\Todo;
use Domain\Todos\States\DoneTodoStatusState;
use Domain\Todos\States\StartedTodoStatusState;

class ToDoneTransition extends TodoTransition
{
    protected array $allowedStates = [
        StartedTodoStatusState::class,
    ];

    public function __construct()
    {
        $this->state = new DoneTodoStatusState();
    }

    public function __invoke(Todo $todo): Todo
    {
        $this->validate($todo);

        $todo->status = $this->state;

        $todo->save();

        //Done logic, side effects, etc.

        return $todo;
    }
}
