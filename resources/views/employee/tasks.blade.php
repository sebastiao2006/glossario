@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')
<div class="container">
    <h2>Minhas Tarefas</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Tarefa</th>
                <th>Empresa</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Prazo</th>
                <th>Status</th>
                
            </tr>
        </thead>

        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->titulo }}</td>
                    <td>{{ $task->empresa->nome }}</td>
                    <td>{{ $task->data_inicio }}</td>
                    <td>{{ $task->data_fim }}</td>
                    <td>
                    <span class="badge {{ $task->prazo_formatado['classe'] }}">
                        {{ $task->prazo_formatado['texto'] }}
                    </span>
                </td>
                    
                <td>
                    <div class="d-flex gap-2">

                        {{-- PENDENTE --}}
                        <form method="POST" action="{{ route('tasks.updateStatus', $task->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="pendente">

                            <button type="submit" class="btn btn-sm 
                                {{ $task->status == 'pendente' ? 'btn-warning' : 'btn-outline-warning' }}">
                                Pendente
                            </button>
                        </form>

                        {{-- EM PROGRESSO --}}
                        <form method="POST" action="{{ route('tasks.updateStatus', $task->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="em_progresso">

                            <button type="submit" class="btn btn-sm 
                                {{ $task->status == 'em_progresso' ? 'btn-primary' : 'btn-outline-primary' }}">
                                Em andamento
                            </button>
                        </form>

                        {{-- CONCLUÍDA --}}
                        <form method="POST" action="{{ route('tasks.updateStatus', $task->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="concluida">

                            <button type="submit" class="btn btn-sm 
                                {{ $task->status == 'concluida' ? 'btn-success' : 'btn-outline-success' }}">
                                Concluída
                            </button>
                        </form>

                    </div>
                </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma tarefa encontrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection