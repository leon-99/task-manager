<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(TaskController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('inprogress', 'inProgress');
    Route::get('finished', 'finished');
    Route::post('finished-toggle/{id}', 'finishedToggle');
    Route::post('status-update/{id}', 'statusToggle');
    Route::post('delete/{id}', 'delete');
    Route::post('add', 'add');
});
