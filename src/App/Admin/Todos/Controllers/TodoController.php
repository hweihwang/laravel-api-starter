<?php

namespace App\Admin\Todos\Controllers;

use App\Admin\Todos\Requests\StoreTodoRequest;
use App\Admin\Todos\Requests\UpdateTodoRequest;
use App\Admin\Todos\Resources\GetListTodoResource;
use App\Admin\Todos\ViewModels\TodoIndexViewModel;
use App\Admin\Todos\ViewModels\TodoShowViewModel;
use Domain\Todos\Actions\CreateTodoAction;
use Domain\Todos\Actions\GetDetailTodoAction;
use Domain\Todos\Actions\GetListTodosAction;
use Domain\Todos\DataTransferObjects\CreateTodoData;
use Domain\Todos\DataTransferObjects\GetDetailTodoData;
use Domain\Todos\DataTransferObjects\GetListTodoData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller
{
    /**
     * @commment List todos.
     *
     * @param Request $request
     * @param GetListTodosAction $action
     * @param GetListTodoData $dTO
     * @param TodoIndexViewModel $viewModel
     * @return AnonymousResourceCollection
     */
    public function index(Request            $request,
                          GetListTodosAction $action,
                          GetListTodoData    $dTO,
                          TodoIndexViewModel $viewModel): AnonymousResourceCollection
    {
        $perPage = $request->get('per_page');
        $curPage = $request->get('current_page');
        $search = $request->get('search');

        return ($viewModel
            ->setTodos(($action)($dTO->setCurPage($curPage)->setPerPage($perPage)->setSearch($search))))();
    }

    /**
     * @commment Create todo.
     *
     * @param StoreTodoRequest $request
     * @param CreateTodoAction $action
     * @param CreateTodoData $dTO
     * @param TodoShowViewModel $viewModel
     *
     * @return JsonResponse|GetListTodoResource
     */
    public function store(StoreTodoRequest  $request,
                          CreateTodoAction  $action,
                          CreateTodoData    $dTO,
                          TodoShowViewModel $viewModel): JsonResponse|GetListTodoResource
    {
        return ($viewModel
            ->setTodo(
                ($action)($dTO->setTitle($request->get('title'))->setContent($request->get('content')))))();
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
