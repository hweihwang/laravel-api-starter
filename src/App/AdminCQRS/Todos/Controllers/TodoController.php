<?php

namespace App\AdminCQRS\Todos\Controllers;

use App\AdminCQRS\Todos\Requests\StoreTodoRequest;
use App\AdminCQRS\Todos\Requests\UpdateTodoRequest;
use App\AdminCQRS\Todos\Resources\GetListTodoResource;
use App\AdminCQRS\Todos\ViewModels\TodoIndexViewModel;
use App\AdminCQRS\Todos\ViewModels\TodoShowViewModel;
use Domain\TodoCQRS\Command\CreateTodoCommand;
use Domain\TodoCQRS\CommandHandler\CreateTodoCommandHandler;
use Domain\TodoCQRS\DataTransferObjects\CreateTodoData;
use Domain\TodoCQRS\DataTransferObjects\GetDetailTodoData;
use Domain\TodoCQRS\DataTransferObjects\GetListTodoData;
use Domain\TodoCQRS\Query\GetListTodosQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller
{
    /**
     * @commment List todos.
     *
     * @param Request $request
     * @param GetListTodosQuery $query
     * @param GetListTodoData $dTO
     * @param TodoIndexViewModel $viewModel
     * @return AnonymousResourceCollection
     */
    public function index(Request            $request,
                          GetListTodosQuery  $query,
                          GetListTodoData    $dTO,
                          TodoIndexViewModel $viewModel): AnonymousResourceCollection
    {
        $perPage = $request->get('per_page');
        $curPage = $request->get('current_page');
        $search = $request->get('search');

        return ($viewModel
            ->setTodos(($query)($dTO->setCurPage($curPage)->setPerPage($perPage)->setSearch($search))))();
    }

    /**
     * @commment Create todo.
     *
     * @param StoreTodoRequest $request
     * @param CreateTodoData $dTO
     * @param TodoShowViewModel $viewModel
     *
     * @return JsonResponse|GetListTodoResource
     * @throws \JsonException
     */
    public function store(StoreTodoRequest  $request,
                          CreateTodoData    $dTO,
                          TodoShowViewModel $viewModel): JsonResponse|GetListTodoResource
    {
        return ($viewModel
            ->setTodo((new CreateTodoCommandHandler(
                new CreateTodoCommand($dTO->setTitle($request->get('title'))->setContent($request->get('content')))))
                ->handle()))();
    }

    /**
     * @commment Show todo.
     *
     * @param $id
     * @param GetDetailTodoAction $action
     * @param GetDetailTodoData $dTO
     * @param TodoShowViewModel $viewModel
     * @return JsonResponse|GetListTodoResource
     */

    public function show($id,
                         GetDetailTodoAction $action,
                         GetDetailTodoData $dTO,
                         TodoShowViewModel $viewModel): JsonResponse|GetListTodoResource
    {
        return ($viewModel
            ->setTodo(($action)($dTO->setId($id))))();
    }

    public function update(UpdateTodoRequest $request,
                                             $id,
                           GetDetailTodoData $dTO,
                           TodoShowViewModel $viewModel): JsonResponse|GetListTodoResource
    {

    }

    public function destroy($id)
    {

    }
}
