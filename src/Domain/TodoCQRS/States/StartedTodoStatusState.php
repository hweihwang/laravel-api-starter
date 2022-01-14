<?php

namespace Domain\TodoCQRS\States;

class StartedTodoStatusState extends TodoStatusState
{
    public string $name = 'started';
}
