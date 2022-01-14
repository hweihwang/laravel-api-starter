<?php

namespace Domain\TodoCQRS\QueryHandler;

use Domain\TodoCQRS\Query\GetListTodosQuery;
use Domain\Todos\Models\Todo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class GetListTodosQueryHandler extends QueryHandler
{
    /**
     * @param GetListTodosQuery $query
     */
    public function __construct(GetListTodosQuery $query)
    {
        parent::__construct($query);
    }

    /**
     * @return LengthAwarePaginator|Collection
     */
    public function handle(): LengthAwarePaginator|Collection
    {
        $data = $this->query->dTO;

        $query = Todo::query()
            ->when($search = $data->getSearch(), function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
                $query->orWhere('content', 'like', '%' . $search . '%');
            });

        $query = $query->orderBy('id', 'desc');

        return ($perPage = $data->getPerPage()) ? $query->paginate($perPage) : $query->get();
    }
}
