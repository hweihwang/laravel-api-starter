<?php

namespace Domain\Todos\Actions;

use Domain\Todos\DataTransferObjects\UpdateTodoData;
use Domain\Todos\Models\Todo;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UpdateTodoAction
{
    /**
     * @commment Create todo
     *
     * @param UpdateTodoData $data
     *
     *
     * @return void
     */
    public function __invoke(UpdateTodoData $data)
    {
        DB::beginTransaction();
        try {
            $todo = Todo::find($data->getId());

            if (empty($todo)) {
                throw new \RuntimeException('Todo not found', ResponseAlias::HTTP_NOT_FOUND);
            }

            $todo = $todo->update([
                'title' => $data->getTitle(),
                'content' => $data->getContent(),
            ]);

            DB::commit();

            return $todo;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
