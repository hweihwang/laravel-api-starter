<?php

namespace Domain\Todos\Transitions;

use Domain\Todos\Models\Todo;
use Domain\Todos\States\DoneTodoStatusState;
use Domain\Todos\States\PendingTodoStatusState;
use Domain\Todos\States\StartedTodoStatusState;

class ToCanceledTransition extends TodoTransition
{
    protected array $allowedStates = [
        PendingTodoStatusState::class,
        StartedTodoStatusState::class,
        DoneTodoStatusState::class,
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

        //Canceled logic, side effects, etc.

        return $todo;
    }
}
