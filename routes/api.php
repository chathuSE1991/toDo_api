<?php

use App\Http\Controllers\ToDoController;
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

Route::prefix('v1')->group(function () {


    Route::post('to_do/save', [ToDoController::class, 'store']);
    Route::get('to_do/list', [ToDoController::class, 'index']);
    Route::get('to_do/update_status/{id}', [ToDoController::class, 'updateToDoStatus']);

});
