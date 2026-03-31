@extends('layouts.admin.app')

@section('title', 'Configurações')

@section('content')
    <h1 class="page-title">Configurações</h1>
    <p class="page-subtitle">Gerencie as configurações do sistema.</p>

    <div class="admin-card">
        <form>
            <div class="mb-3">
                <label class="form-label">Nome do Site</label>
                <input type="text" class="form-control" value="Kivula">
            </div>

            <div class="mb-3">
                <label class="form-label">Email de Contato</label>
                <input type="email" class="form-control" value="contato@kivula.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" class="form-control" value="+351 900 000 000">
            </div>

            <button class="btn btn-primary">Salvar Configurações</button>
        </form>
    </div>
@endsection