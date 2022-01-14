<?php

namespace Domain\Todos\Actions;

use Domain\Todos\DataTransferObjects\CreateTodoData;
use Domain\Todos\Models\Todo;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateTodoAction
{
    /**
     * @commment Create todo
     *
     * @param CreateTodoData $data
     * @return Todo
     * @throws Exception
     */
    public function __invoke(CreateTodoData $data): Todo
    {
        DB::beginTransaction();
        try {
            $todo = Todo::create([
                'title' => $data->getTitle(),
                'content' => $data->getContent(),
            ]);

            throw new \RuntimeException('Cannot create todo');

            DB::commit();

            return $todo;
        } catch (Exception $e) {
            DB::rollBack();

            throw new \DomainException('Cannot create todo');
        }
    }
}
