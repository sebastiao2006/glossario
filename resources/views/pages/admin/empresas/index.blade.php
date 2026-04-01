@extends('layouts.admin.app')

@section('title', 'Empresas')

@section('content')
    <h1>Empresas</h1>

    <a href="{{ route('admin.empresas.create') }}" class="btn btn-primary mb-3">
        Nova Empresa
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>NIF</th>
                <th>Telefone</th>
                <th>Localização</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nome }}</td>
                    <td>{{ $empresa->nif }}</td>
                    <td>{{ $empresa->telefone }}</td>
                    <td>{{ $empresa->localizacao }}</td>
                    <td>
                        <!-- BOTÃO EDITAR -->
                        <button 
                            class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#editEmpresaModal{{ $empresa->id }}">
                            Editar
                        </button>

                        <!-- BOTÃO EXCLUIR -->
                        <form action="{{ route('admin.empresas.destroy', $empresa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach($empresas as $empresa)
    <div class="modal fade" id="editEmpresaModal{{ $empresa->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ route('admin.empresas.update', $empresa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Editar Empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-2">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="{{ $empresa->nome }}">
                        </div>

                        <div class="mb-2">
                            <label>NIF</label>
                            <input type="text" name="nif" class="form-control" value="{{ $empresa->nif }}">
                        </div>

                        <div class="mb-2">
                            <label>Telefone</label>
                            <input type="text" name="telefone" class="form-control" value="{{ $empresa->telefone }}">
                        </div>

                        <div class="mb-2">
                            <label>Localização</label>
                            <input type="text" name="localizacao" class="form-control" value="{{ $empresa->localizacao }}">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Salvar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    @endforeach
@endsection