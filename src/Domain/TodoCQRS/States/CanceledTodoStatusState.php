<?php

namespace Domain\TodoCQRS\States;

class CanceledTodoStatusState extends TodoStatusState
{
    public string $name = 'canceled';
}
