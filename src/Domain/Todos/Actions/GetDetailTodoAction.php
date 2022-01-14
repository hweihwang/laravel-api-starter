<?php

namespace Domain\Todos\Actions;

use Domain\Todos\DataTransferObjects\GetDetailTodoData;
use Domain\Todos\Models\Todo;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class GetDetailTodoAction
{
    /**
     *
     * @param GetDetailTodoData $data
     * @return Todo|null
     */

    public function __invoke(GetDetailTodoData $data): ?Todo
    {
        $todo = Todo::find($data->getId());

        if (empty($todo)) {
            throw new \DomainException('Todo not found.');
        }

        return $todo;
    }
}
