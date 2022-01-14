<?php

namespace Domain\TodoCQRS\Query;

use Domain\TodoCQRS\DataTransferObjects\GetListTodoData;

class GetListTodosQuery extends Query
{
    public function __construct(GetListTodoData $dTO)
    {
        parent::__construct($dTO);
    }
}
