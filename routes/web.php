<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CongesController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProjectsController;


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


Route::get('/login', function () {
    return view('/auth/login');
});



Route::get('edit-user/{id}', [UserController::class, 'edit']);
Route::put('update-user/{id}', [UserController::class, 'update']);
Route::delete('delete-user/{id}', [UserController::class, 'destroy']);





Route::middleware(['manager'])->group(function () {
    Route::resource('personnels', PersonnelsController::class);
    Route::put('projects/update-task-assign-to/{id}', [ProjectsController::class, 'updateTaskAssignTo'])->name('projects.updateTaskAssignTo');

    Route::resource('postes', PostesController::class);

});



Route::middleware(['directeur'])->group(function () {

    Route::get('conges/validate', [CongesController::class, 'toValide'])->name('conges.validate');
    Route::post('conges/accept/{id}', [CongesController::class, 'toAccept'])->name('conges.accept');
    Route::post('conges/reject/{id}', [CongesController::class, 'toReject'])->name('conges.reject');

});


Route::middleware(['managerOrDirecteur'])->group(function () {

    Route::resource('projects', ProjectsController::class);
    Route::resource('clients', ClientsController::class);

});

Route::put('mytask/update-task-completed/{id}', [TasksController::class, 'updateTaskCompleted'])->name('mytask.updateTaskCompleted');
Route::resource('mytask', TasksController::class);


Route::resource('conges', CongesController::class);


Route::resource('dashboard', DashboardController::class);


Route::get('mailbox', function () {
    return view('mailbox/mailbox');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\TasksController::class, 'index'])->name('home');


Route::get('**', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
