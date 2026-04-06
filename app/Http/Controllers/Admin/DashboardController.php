<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class DashboardController extends Controller
{


public function index()
{
    $totalFuncionarios = User::where('role', '!=', 'admin')->count();
    $totalAdmins = User::where('role', 'admin')->count();

    $tarefasEntregues = Task::count(); // todas as tarefas criadas
    $tarefasConcluidas = Task::where('status', 'concluida')->count();

    $tarefasPendentes = Task::where('status', 'pendente')->count();
    $tarefasEmAndamento = Task::where('status', 'em_progresso')->count();

    $rankingFuncionarios = User::where('role', '!=', 'admin')
    ->withCount(['tasks as tarefas_concluidas' => function ($query) {
        $query->where('status', 'concluida');
    }])
    ->orderByDesc('tarefas_concluidas')
    ->get();

    return view('pages.admin.dashboard', compact(
        'totalFuncionarios',
        'totalAdmins',
        'tarefasEntregues',
        'tarefasConcluidas',
        'tarefasPendentes',
        'tarefasEmAndamento',
        'rankingFuncionarios' // 👈 adicionar isto
    ));

}
public function produtividade()
{
    $usuarios = User::where('role', 'funcionario')
        ->withCount([
            'tasks',
            'empresas',
            'tasks as tarefas_concluidas' => function ($query) {
                $query->where('status', 'concluida');
            }
        ])
        ->get();

    $maisProdutivo = $usuarios->sortByDesc('tarefas_concluidas')->first();

    return view('pages.admin.produtividade', compact('usuarios', 'maisProdutivo'));
}
}
