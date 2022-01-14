<?php

namespace Domain\TodoCQRS\QueryHandler;

use Domain\TodoCQRS\Query\Query;

abstract class QueryHandler
{
    public function __construct(public Query $query)
    {
    }

    abstract public function handle();
}
