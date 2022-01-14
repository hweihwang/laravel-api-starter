<?php

namespace App\Admin\Todos\ViewModels;

use App\Admin\Todos\Resources\GetListTodoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoIndexViewModel
{
    public mixed $todos;

    public function __construct()
    {
    }

    /**
     * @param mixed $todos
     * @return self
     */
    public function setTodos(mixed $todos): self
    {
        $this->todos = $todos;

        return $this;
    }

    public function __invoke(): AnonymousResourceCollection
    {
        return GetListTodoResource::collection($this->todos);
    }
}
