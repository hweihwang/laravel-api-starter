<?php

use App\Admin\Todos\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'todos'], static function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::post('/', [TodoController::class, 'store']);
    Route::get('/{id}', [TodoController::class, 'show']);
    Route::put('/{id}', [TodoController::class, 'update']);
    Route::delete('/{id}', [TodoController::class, 'destroy']);
});
