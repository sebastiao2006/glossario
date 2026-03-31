@extends('layouts.admin.app')

@section('title', 'Novo Usuário')

@section('content')
    <h1 class="page-title">Novo Usuário</h1>
    <p class="page-subtitle">Adicione um novo usuário ao sistema.</p>

    <div class="admin-card">
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" placeholder="Digite o nome">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Digite o email">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Digite a senha">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tipo de Usuário</label>
                    <select class="form-select">
                        <option>Admin</option>
                        <option>Usuário</option>
                    </select>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                </div>
            </div>
        </form>
    </div>
@endsection