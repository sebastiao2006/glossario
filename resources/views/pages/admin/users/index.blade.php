@extends('layouts.admin.app')

@section('title', 'Usuários')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title mb-1">Usuários</h1>
            <p class="page-subtitle mb-0">Gerencie todos os usuários cadastrados.</p>
        </div>

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Novo Usuário
        </a>
    </div>

    <div class="admin-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sebastião Cardoso</td>
                        <td>sebastiao@email.com</td>
                        <td><span class="badge bg-primary">Admin</span></td>
                        <td><span class="badge bg-success">Ativo</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.users.edit', 1) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <button class="btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>João Paulo</td>
                        <td>joao@email.com</td>
                        <td><span class="badge bg-secondary">Usuário</span></td>
                        <td><span class="badge bg-success">Ativo</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.users.edit', 2) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <button class="btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection