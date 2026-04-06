@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')

<style>
    .page-title {
        font-weight: 700;
        margin-bottom: 25px;
    }

    .card-dashboard {
        border: none;
        border-radius: 12px;
        transition: 0.3s;
    }

    .card-dashboard:hover {
        transform: translateY(-5px);
    }

    .card-icon {
        font-size: 30px;
        margin-bottom: 10px;
    }

    .card-total {
        font-size: 28px;
        font-weight: bold;
    }

    .empresa-badge {
        padding: 8px 14px;
        border-radius: 20px;
        margin: 5px;
        font-size: 13px;
    }

    .task-item {
        transition: 0.2s;
        border-left: 5px solid #ddd;
    }

    .task-item:hover {
        background: #f8f9fa;
    }

    .status-badge {
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 12px;
    }
</style>

<h1 class="page-title">Dashboard Funcionário</h1>

<!-- Cards -->
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card card-dashboard shadow-sm text-center p-3">
            <div class="card-icon text-primary">
                <i class="bi bi-list-task"></i>
            </div>
            <h6>Total de Tarefas</h6>
            <div class="card-total text-primary">
                {{ $totalTarefas ?? 0 }}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-dashboard shadow-sm text-center p-3">
            <div class="card-icon text-success">
                <i class="bi bi-check-circle"></i>
            </div>
            <h6>Tarefas Pendentes</h6>
            <div class="card-total text-success">
                {{ $tarefasPequenas->count() }}
            </div>
        </div>
    </div>

</div>

<!-- Empresas -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-white border-0">
        <strong>Minhas Empresas</strong>
    </div>
    <div class="card-body">
        @forelse($empresas as $empresa)
            <span class="badge bg-primary empresa-badge">
                {{ $empresa->nome }}
            </span>
        @empty
            <p class="text-muted">Nenhuma empresa atribuída.</p>
        @endforelse
    </div>
</div>

<!-- Tarefas -->
<div class="card shadow-sm">
    <div class="card-header bg-white border-0">
        <strong>Minhas Tarefas</strong>
    </div>
    <div class="card-body">

        @forelse($tarefas as $task)

            @php
                $cor = match($task->status) {
                    'pendente' => 'warning',
                    'em andamento' => 'info',
                    'concluída' => 'success',
                    default => 'secondary'
                };
            @endphp

            <div class="task-item p-3 mb-3 rounded shadow-sm d-flex justify-content-between align-items-center">

                <div>
                    <strong>{{ $task->titulo }}</strong><br>
                    <small class="text-muted">
                        Atualizado recentemente
                    </small>
                </div>

                <span class="badge bg-{{ $cor }} status-badge">
                    {{ ucfirst($task->status) }}
                </span>

            </div>

        @empty
            <p class="text-muted">Sem tarefas atribuídas.</p>
        @endforelse

    </div>
</div>

@endsection