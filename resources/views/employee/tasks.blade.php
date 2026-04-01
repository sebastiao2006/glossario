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
                    <td>{{ ucfirst($task->status) }}</td>
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