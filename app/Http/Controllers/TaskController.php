<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // listar tarefas (admin)
    public function index(Request $request)
    {
        $query = Task::with(['user', 'empresa']);

        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $tasks = $query->latest()->get();
        $users = User::where('role', '!=', 'admin')->get();
        $empresas = Empresa::all();

return view('pages.admin.tasks.index', compact('tasks', 'users', 'empresas'));
    }

    // guardar tarefa
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'empresa_id' => 'required',
            'titulo' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        Task::create($request->all());

        return back()->with('success', 'Tarefa criada com sucesso!');
    }
    public function minhasTarefas()
    {
        $user = auth()->user();

        $tasks = Task::where('user_id', $user->id)
                    ->with('empresa')
                    ->latest()
                    ->get();

        return view('employee.tasks', compact('tasks'));
    }

    public function updateStatus(Request $request, $id)
{
    $task = Task::findOrFail($id);

    $request->validate([
        'status' => 'required|in:pendente,em_progresso,concluida',
    ]);

    $task->status = $request->status;
    $task->save();

    return back()->with('success', 'Status atualizado com sucesso!');
}
}