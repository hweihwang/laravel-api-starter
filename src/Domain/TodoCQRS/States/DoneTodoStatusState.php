<?php

namespace Domain\TodoCQRS\States;

class DoneTodoStatusState extends TodoStatusState
{
    public string $name = 'done';
}
