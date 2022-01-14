<?php

namespace Domain\Todos\States;

class PendingTodoStatusState extends TodoStatusState
{
    public string $name = 'pending';
}
