<?php

namespace Domain\Todos\Actions;

use Domain\Todos\Models\Todo;
use Domain\Todos\Transitions\TodoTransition;

class ChangeTodoStatusAction
{
    public function __invoke(Todo $todo, TodoTransition $transition): Todo
    {
        return ($transition)($todo);
    }
}
