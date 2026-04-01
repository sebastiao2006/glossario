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
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nome }}</td>
                    <td>{{ $empresa->nif }}</td>
                    <td>{{ $empresa->telefone }}</td>
                    <td>{{ $empresa->localizacao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection