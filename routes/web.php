<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CongesController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\DashboardController;


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


Route::get('/', function () {
    return view('/auth/login');
});

Route::resource('clients', ClientsController::class);

Route::resource('personnels', PersonnelsController::class);

Route::resource('postes', PostesController::class);
Route::get('conges/validate', [CongesController::class, 'toValide'])->name('conges.validate');
Route::post('conges/accept/{id}', [CongesController::class, 'toAccept'])->name('conges.accept');
Route::post('conges/reject/{id}', [CongesController::class, 'toReject'])->name('conges.reject');

Route::resource('conges', CongesController::class);



//Route::get('display-post', [PostsController::class, 'index'])->name('posts.index');
//
//Route::get('create-post', [PostsController::class, 'create'])->name('posts.create');
//
//Route::post('save-post', [PostsController::class, 'save'])->name('posts.save');



Route::resource('dashboard', DashboardController::class);


Route::get('mailbox', function () {
    return view('mailbox/mailbox');
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
