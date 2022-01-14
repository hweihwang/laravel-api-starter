<?php

namespace Domain\Todos\Actions;

use Domain\Todos\DataTransferObjects\CreateTodoData;
use Domain\Todos\Models\Todo;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateTodoAction
{
    /**
     * @commment Create todo
     *
     * @param CreateTodoData $data
     * @return void
     */
    public function __invoke(CreateTodoData $data)
    {
        DB::beginTransaction();
        try {
            $todo = Todo::create([
                'title' => $data->getTitle(),
                'content' => $data->getContent(),
            ]);

            DB::commit();

            return $todo;
        } catch (Exception $e) {
            DB::rollBack();

            throw new \DomainException('Cannot create todo');
        }
    }
}
