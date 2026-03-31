@extends('layouts.admin.app')

@section('title', 'Posts')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="page-title mb-1">Posts</h1>
            <p class="page-subtitle mb-0">Gerencie os conteúdos publicados.</p>
        </div>

        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Novo Post
        </a>
    </div>

    <div class="admin-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Primeiro Post</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Publicado</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.posts.edit', 1) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <button class="btn btn-sm btn-outline-danger">Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection