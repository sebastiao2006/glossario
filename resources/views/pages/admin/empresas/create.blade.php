@extends('layouts.admin.app')

@section('title', 'Nova Empresa')

@section('content')
    <h1>Nova Empresa</h1>

    <form method="POST" action="{{ route('admin.empresas.store') }}">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>

            <div class="col-md-6">
                <label>NIF</label>
                <input type="text" name="nif" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Localização</label>
                <input type="text" name="localizacao" class="form-control">
            </div>

            <div class="col-md-6">
                <label>Senha do Portal (opcional)</label>
                <input type="text" name="senha_portal" class="form-control">
            </div>

            <div class="col-12 mt-3">
                <button class="btn btn-success">Salvar</button>
            </div>

        </div>
    </form>
@endsection