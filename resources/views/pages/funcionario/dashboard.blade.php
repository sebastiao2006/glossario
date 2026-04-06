@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')

<h1 class="page-title">Dashboard Funcionário</h1>

<!-- Cards -->
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Total de Tarefas</h5>
                <h2>{{ $totalTarefas ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Tarefas Pequenas</h5>
                <h2>{{ $tarefasPequenas->count() }}</h2>
            </div>
        </div>
    </div>

</div>

<!-- Empresas -->
<div class="card mb-4">
    <div class="card-header">
        <strong>Empresas atribuídas</strong>
    </div>
    <div class="card-body">
        @forelse($empresas as $empresa)
            <span class="badge bg-primary">{{ $empresa->nome }}</span>
        @empty
            <p>Nenhuma empresa atribuída.</p>
        @endforelse
    </div>
</div>

<!-- Tarefas -->
<div class="card">
    <div class="card-header">
        <strong>Minhas Tarefas</strong>
    </div>
    <div class="card-body">
        @forelse($tarefas as $task)
            <div class="border p-2 mb-2 rounded">
                <strong>{{ $task->titulo }}</strong><br>
                <small>Status: {{ $task->status }}</small>
            </div>
        @empty
            <p>Sem tarefas atribuídas.</p>
        @endforelse
    </div>
</div>

@endsection