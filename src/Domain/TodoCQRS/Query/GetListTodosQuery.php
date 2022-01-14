<?php

namespace Domain\TodoCQRS\Query;

use Domain\TodoCQRS\DataTransferObjects\GetListTodoData;
use Domain\Todos\Models\Todo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class GetListTodosQuery
{

    /**
     *
     * @param GetListTodoData $data
     * @return LengthAwarePaginator|Collection
     */

    public function __invoke(GetListTodoData $data): LengthAwarePaginator|Collection
    {
        $query = Todo::query()
            ->when($search = $data->getSearch(), function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
                $query->orWhere('content', 'like', '%' . $search . '%');
            });

        $query = $query->orderBy('id', 'desc');

        return ($perPage = $data->getPerPage()) ? $query->paginate($perPage) : $query->get();
    }
}
