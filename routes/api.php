<?php

use App\Http\Controllers\DraggableTaskController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users', [UserController::class, 'store']);

Route::group([
    'prefix' => 'v1',
    'middleware' => 'auth:api'
], function () {
    Route::get('authenticated', fn() => response()->json(request()->user()));

    Route::resources([
        'users' => UserController::class,
        'tasks' => TaskController::class
    ]);

    Route::group(['prefix' => 'drag'], function () {
        Route::put('up-down', [DraggableTaskController::class, 'updateByDragUpDown']);
        Route::put('down-up', [DraggableTaskController::class, 'updateByDragDownUp']);
    });
});
