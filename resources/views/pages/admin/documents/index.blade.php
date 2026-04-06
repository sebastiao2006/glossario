@extends('layouts.admin.app')

@section('title', 'Documentos')

@section('content')

<div class="d-flex justify-content-between mb-3">
    {{-- <h2>📁 Documentos</h2> --}}

    <a href="{{ route('admin.documents.create') }}" class="btn btn-primary">
        Novo Documento
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Ficheiro</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $doc)
        <tr>
            <td>{{ $doc->titulo }}</td>
            <td>{{ $doc->empresa->nome ?? '-' }}</td>
            <td>
                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">
                    Ver
                </a>
            </td>
            <td>
                <form action="{{ route('admin.documents.destroy', $doc->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection