@extends('layouts.admin.app')

@section('title', 'Editar Post')

@section('content')
    <h1 class="page-title">Editar Post</h1>
    <p class="page-subtitle">Atualize o conteúdo do post.</p>

    <div class="admin-card">
        <form>
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" value="Primeiro Post">
            </div>

            <div class="mb-3">
                <label class="form-label">Conteúdo</label>
                <textarea class="form-control" rows="6">Conteúdo do post...</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option selected>Publicado</option>
                    <option>Rascunho</option>
                </select>
            </div>

            <button class="btn btn-primary">Atualizar Post</button>
        </form>
    </div>
@endsection