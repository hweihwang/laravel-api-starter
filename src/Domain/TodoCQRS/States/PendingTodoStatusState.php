<?php

namespace Domain\TodoCQRS\States;

class PendingTodoStatusState extends TodoStatusState
{
    public string $name = 'pending';
}
