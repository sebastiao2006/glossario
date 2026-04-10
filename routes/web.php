<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Funcionario\MyEmpresaController;
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

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

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


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
        Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
        Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
        Route::put('/empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas.update');
        Route::delete('/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.destroy');
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
            Route::get('/produtividade', [DashboardController::class, 'produtividade'])
        ->name('produtividade');
        Route::put('/empresas/{id}/atribuir', [EmpresaController::class, 'atribuirUser'])
    ->name('empresas.atribuir');
     Route::resource('documents', DocumentController::class);
        

    });
    


    Route::prefix('funcionario')
    ->name('funcionario.')
    ->middleware(['auth'])
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'funcionario'])
        ->name('dashboard');


        Route::get('/perfil', function () {
            return view('pages.funcionario.perfil');
        })->name('perfil');

        Route::get('/empresas', [EmpresaController::class, 'listaFuncionario'])
            ->name('empresas.index');
                    // 👉 ADICIONA ESTA ROTA
        Route::get('/tarefas', [TaskController::class, 'minhasTarefas'])
            ->name('tarefas.index');
            
Route::get('/meus-documentos', [DocumentController::class, 'meusDocumentos'])
    ->name('documents.index');
    });

            Route::patch('/tasks/{id}/status', [TaskController::class, 'updateStatus'])
        ->name('tasks.updateStatus');




Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

    Route::get('/my-empresas', [MyEmpresaController::class, 'index'])
    ->name('funcionario.my-empresas');

Route::post('/my-empresas/{empresa}/regularizar',
    [MyEmpresaController::class, 'storeRegularizacao']
)->name('funcionario.regularizar.store');

Route::post('/my-empresas/{empresa}/finalizar',
    [MyEmpresaController::class, 'finalizar']
)->name('funcionario.finalizar');

Route::post('/my-empresas/{empresa}/regularizacao/update',
    [MyEmpresaController::class, 'updateRegularizacao']
)->name('funcionario.update.regularizacao');

require __DIR__.'/auth.php';