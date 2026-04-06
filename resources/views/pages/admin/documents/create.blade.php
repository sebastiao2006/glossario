@extends('layouts.admin.app')

@section('title', 'Novo Documento')

@section('content')

{{-- <h2>📤 Upload Documento</h2> --}}

<form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Empresa</label>
<select name="empresa_id" class="form-control" required style="height: auto; min-height: 40px;">
    <option value="">Seleciona uma empresa</option>
    @foreach($empresas as $empresa)
        <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
    @endforeach
</select>
    </div>

    <div class="mb-3">
        <label>Ficheiro</label>
        <input type="file" name="file" class="form-control" required>
    </div>

    <button class="btn btn-success">Guardar</button>
</form>

@endsection