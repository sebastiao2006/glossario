<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.site.home');
})->name('site.home');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('pages.admin.users.index');
    })->name('users.index');

    Route::get('/users/create', function () {
        return view('pages.admin.users.create');
    })->name('users.create');

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