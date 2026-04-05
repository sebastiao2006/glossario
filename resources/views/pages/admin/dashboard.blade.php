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

    {{--     <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <h6 class="text-muted">Admins</h6>
                <h2>{{ $totalAdmins }}</h2>
            </div>
        </div> --}}

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Tarefas Entregues</h6>
            <h2>{{ $tarefasEntregues }}</h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Concluídas</h6>
            <h2>{{ $tarefasConcluidas }}</h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Em andamento</h6>
            <h2>{{ $tarefasEmAndamento }}</h2>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <h6 class="text-muted">Pendentes</h6>
            <h2>{{ $tarefasPendentes }}</h2>
        </div>
    </div>
</div>
    
<div class="admin-card mt-4">
    <h5 class="fw-bold mb-3">Ranking de Funcionários</h5>

    <div class="row">
        <!-- Gráfico -->
        <div class="col-md-7">
            <canvas id="rankingChart" height="200"></canvas>
        </div>

        <!-- Lista -->
        <div class="col-md-5">
            <ul class="list-group">
                @foreach($rankingFuncionarios as $index => $funcionario)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $index + 1 }}. {{ $funcionario->name }}
                        <span class="badge bg-primary rounded-pill">
                            {{ $funcionario->tarefas_concluidas }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = @json($rankingFuncionarios->pluck('name'));
    const data = @json($rankingFuncionarios->pluck('tarefas_concluidas'));

    const ctx = document.getElementById('rankingChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Tarefas Concluídas',
                data: data,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection

