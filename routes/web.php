<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\TodoListController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/guest', function () {
    Auth::login(User::factory()->create());
    return redirect("/dashboard");
})->name('guest');


Route::group(["middleware" => ['auth:sanctum', 'verified']], function (){

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
    Route::get('/community/{id}', [CommunityController::class, 'show'])->name('community.show');

    Route::middleware(['throttle:article'])->post('/community', [CommunityController::class, 'statistics']);

    Route::resource('todolist', TodoListController::class)->only(['index', 'store', 'update', 'destroy']);
});

