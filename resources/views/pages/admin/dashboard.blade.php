@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Resumo geral do painel administrativo.</p>

<div class="row g-4 mb-4">

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Funcionários</h6>
            <h2>{{ $totalFuncionarios }}</h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Tarefas Entregues</h6>
            <h2>{{ $tarefasEntregues }}</h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Tarefas Concluídas</h6>
            <h2>{{ $tarefasConcluidas }}</h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Admins</h6>
            <h2>{{ $totalAdmins }}</h2>
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