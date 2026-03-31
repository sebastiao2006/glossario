@extends('layouts.admin.app')

@section('title', 'Novo Post')

@section('content')
    <h1 class="page-title">Novo Post</h1>
    <p class="page-subtitle">Crie um novo conteúdo.</p>

    <div class="admin-card">
        <form>
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" placeholder="Digite o título">
            </div>

            <div class="mb-3">
                <label class="form-label">Conteúdo</label>
                <textarea class="form-control" rows="6" placeholder="Digite o conteúdo"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                    <option>Publicado</option>
                    <option>Rascunho</option>
                </select>
            </div>

            <button class="btn btn-primary">Salvar Post</button>
        </form>
    </div>
@endsection