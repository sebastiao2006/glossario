@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')

<div class="p-6 space-y-6 bg-gray-100 min-h-screen">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500">Resumo geral do painel administrativo.</p>
    </div>

    {{-- 🔥 Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        {{-- Gradient destaque --}}
        <div class="p-5 rounded-2xl text-white shadow-lg bg-gradient-to-r from-[#4b4b4b] to-[#4b4b4b]">
            <p class="opacity-80">Funcionários</p>
            <h2 class="text-3xl font-bold">{{ $totalFuncionarios }}</h2>
        </div>

        <div class="p-5 rounded-2xl text-white shadow-lg bg-gradient-to-r from-[#4b4b4b] to-[#4b4b4b]">
            <p class="opacity-80">Tarefas Entregues</p>
            <h2 class="text-3xl font-bold">{{ $tarefasEntregues }}</h2>
        </div>

        {{-- Cards normais --}}
        <div class="bg-white p-5 rounded-2xl shadow-md">
            <p class="text-gray-500">Concluídas</p>
            <h2 class="text-3xl font-bold text-gray-800">{{ $tarefasConcluidas }}</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-md">
            <p class="text-gray-500">Em andamento</p>
            <h2 class="text-3xl font-bold text-gray-800">{{ $tarefasEmAndamento }}</h2>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-md">
            <p class="text-gray-500">Pendentes</p>
            <h2 class="text-3xl font-bold text-gray-800">{{ $tarefasPendentes }}</h2>
        </div>

    </div>

    {{-- 🥇 Ranking + Gráfico --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        {{-- 📊 Gráfico --}}
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-md">
            <h5 class="font-semibold text-gray-800 mb-4">Ranking de Funcionários</h5>

            <div class="h-64">
                <canvas id="rankingChart"></canvas>
            </div>
        </div>

        {{-- 🏆 Ranking lista --}}
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h5 class="font-semibold text-gray-800 mb-4">Top Funcionários</h5>

            @foreach($rankingFuncionarios as $index => $funcionario)

            <div class="flex items-center justify-between py-2 border-b last:border-0">

                <div class="flex items-center gap-3">

                    {{-- Badge ranking --}}
                    <div class="
                        w-8 h-8 flex items-center justify-center rounded-full text-white text-sm font-bold
                        {{ $index == 0 ? 'bg-yellow-400' : '' }}
                        {{ $index == 1 ? 'bg-gray-400' : '' }}
                        {{ $index == 2 ? 'bg-orange-400' : '' }}
                        {{ $index > 2 ? 'bg-gray-200 text-gray-700' : '' }}
                    ">
                        {{ $index + 1 }}
                    </div>

                    <span class="text-gray-700 font-medium">
                        {{ $funcionario->name }}
                    </span>
                </div>

                <span class="text-sm px-3 py-1 rounded-full bg-gradient-to-r from-[#feae1b] to-[#ff914d] text-white">
                    {{ $funcionario->tarefas_concluidas }}
                </span>

            </div>

            @endforeach
        </div>

    </div>

</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('rankingChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($rankingFuncionarios->pluck('name')),
        datasets: [{
            label: 'Tarefas Concluídas',
            data: @json($rankingFuncionarios->pluck('tarefas_concluidas')),
            borderRadius: 8,
            backgroundColor: function(context) {
                const gradient = context.chart.ctx.createLinearGradient(0, 0, 0, 300);
                gradient.addColorStop(0, '#feae1b');
                gradient.addColorStop(1, '#ff914d');
                return gradient;
            }
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false, // 👈 controla altura
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: '#eee' }
            },
            x: {
                grid: { display: false }
            }
        }
    }
});
</script>

@endsection