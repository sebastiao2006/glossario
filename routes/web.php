<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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

/* Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 
require __DIR__.'/auth.php'; */


Route::get('/', function () {
    return view('pages.site.home');
})->name('site.home');

Route::get('/about', function () {
    return view('pages.site.about');
})->name('site.about');

Route::get('/services', function () {
    return view('pages.site.services');
})->name('site.services');

Route::get('/contact', function () {
    return view('pages.site.contact');
})->name('site.contact');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('pages.admin.users.index');
    })->name('users.index');

    Route::get('/users/create', function () {
        return view('pages.admin.users.create');
    })->name('users.create');

   Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

    Route::get('/users/{id}/edit', function ($id) {
        return view('pages.admin.users.edit');
    })->name('users.edit');

    Route::get('/posts', function () {
        return view('pages.admin.posts.index');
    })->name('posts.index');

    Route::get('/posts/create', function () {
        return view('pages.admin.posts.create');
    })->name('posts.create');

    Route::get('/posts/{id}/edit', function ($id) {
        return view('pages.admin.posts.edit');
    })->name('posts.edit');

    Route::get('/settings', function () {
        return view('pages.admin.settings.index');
    })->name('settings.index');
});

Route::prefix('funcionario')
    ->name('funcionario.')
    ->middleware(['auth', 'funcionario'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('pages.funcionario.dashboard');
        })->name('dashboard');

    });

require __DIR__.'/auth.php';