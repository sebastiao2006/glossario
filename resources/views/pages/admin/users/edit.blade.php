@extends('layouts.admin.app')

@section('title', 'Editar Usuário')

@section('content')
    <h1 class="page-title">Editar Usuário</h1>
    <p class="page-subtitle">Atualize as informações do usuário.</p>

    <div class="admin-card">
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" value="Sebastião Cardoso">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="sebastiao@email.com">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nova Senha</label>
                    <input type="password" class="form-control" placeholder="Deixe em branco para manter">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tipo de Usuário</label>
                    <select class="form-select">
                        <option selected>Admin</option>
                        <option>Usuário</option>
                    </select>
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
                </div>
            </div>
        </form>
    </div>
@endsection