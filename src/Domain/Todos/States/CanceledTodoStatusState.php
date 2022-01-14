<?php

namespace Domain\Todos\States;

class CanceledTodoStatusState extends TodoStatusState
{
    public string $name = 'canceled';
}
