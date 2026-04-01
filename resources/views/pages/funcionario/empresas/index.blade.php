@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')
    <div class="max-w-7xl mx-auto p-6">
        <h1>Empresas</h1>

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
    </div>
@endsection