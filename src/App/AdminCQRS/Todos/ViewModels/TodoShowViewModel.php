<?php

namespace App\AdminCQRS\Todos\ViewModels;

use App\AdminCQRS\Todos\Resources\GetListTodoResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TodoShowViewModel
{
    public mixed $todo;

    /**
     * @param mixed $todo
     * @return self
     */
    public function setTodo(mixed $todo): self
    {
        $this->todo = $todo;

        return $this;
    }

    public function __invoke(): JsonResponse|GetListTodoResource
    {
        if(!$this->todo) {
            return response()->json(['data' => 'Todo not found'], Response::HTTP_NOT_FOUND);
        }

        return new GetListTodoResource($this->todo);
    }
}
