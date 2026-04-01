@extends('layouts.admin.app')

@section('title', 'Tarefas')

@section('content')

<div class="container mt-4">

    <!-- BOTÃO PARA ABRIR MODAL -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#taskModal">
        + Nova Tarefa
    </button>

    <!-- FILTRO PEQUENO -->
<form method="GET" class="mb-3 d-flex align-items-center gap-2">
    <select name="user_id" onchange="this.form.submit()" class="form-select form-select-sm w-auto">
        
        <!-- OPÇÃO PARA VER TODOS -->
        <option value="">Todos os funcionários</option>

        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</form>

    <!-- TABELA ESTILIZADA -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Tarefa</th>
                        <th>Funcionário</th>
                        <th>Empresa</th>
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->titulo }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->empresa->nome }}</td>
                            <td>{{ $task->data_inicio }}</td>
                            <td>{{ $task->data_fim }}</td>
                            <td>
                                <span class="badge bg-info">{{ $task->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="taskModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Nova Tarefa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.tasks.store') }}" method="POST">
                @csrf

                <div class="modal-body row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Funcionário</label>
                        <select name="user_id" class="form-select" required>
                            <option value="">Selecionar</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Empresa</label>
                        <select name="empresa_id" class="form-select" required>
                            <option value="">Selecionar</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Data Início</label>
                        <input type="date" name="data_inicio" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Data Fim</label>
                        <input type="date" name="data_fim" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection