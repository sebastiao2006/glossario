@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Resumo geral do painel administrativo.</p>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h6 class="text-muted">Usuários</h6>
                <h2 class="fw-bold mb-0">120</h2>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-file-earmark-text-fill"></i>
                </div>
                <h6 class="text-muted">Posts</h6>
                <h2 class="fw-bold mb-0">48</h2>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <h6 class="text-muted">Mensagens</h6>
                <h2 class="fw-bold mb-0">32</h2>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-gear-fill"></i>
                </div>
                <h6 class="text-muted">Configurações</h6>
                <h2 class="fw-bold mb-0">6</h2>
            </div>
        </div>
    </div>

    <div class="admin-card">
        <h5 class="fw-bold mb-3">Bem-vindo ao painel</h5>
        <p class="text-muted mb-0">
            Aqui você poderá gerenciar usuários, conteúdos, configurações e outras funcionalidades do sistema.
        </p>
    </div>
@endsection