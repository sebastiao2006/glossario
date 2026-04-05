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

    // valores estáticos (temporário)
    $tarefasEntregues = 12;
    $tarefasConcluidas = 8;

    return view('pages.admin.dashboard', compact(
        'totalFuncionarios',
        'totalAdmins',
        'tarefasEntregues',
        'tarefasConcluidas'
    ));
}
}
