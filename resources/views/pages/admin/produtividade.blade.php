@extends('layouts.admin.app')

@section('title', 'Produtividade')

@section('content')

<div class="p-6 space-y-6 bg-gray-100 min-h-screen">

    <h1 class="text-2xl font-bold text-gray-800">Produtividade dos Funcionários</h1>

    {{-- 🔥 Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

        {{-- Card --}}
        <div class="p-5 rounded-2xl text-white shadow-lg bg-gradient-to-r from-[#feae1b] to-[#ff914d]">
            <p class="opacity-80">Total Funcionários</p>
            <h2 class="text-3xl font-bold">{{ count($usuarios) }}</h2>
        </div>

        <div class="p-5 rounded-2xl text-white shadow-lg bg-gradient-to-r from-[#feae1b] to-[#ff914d]">
            <p class="opacity-80">Mais Produtivo</p>
            <h2 class="text-lg font-bold">
                {{ $maisProdutivo->name ?? '-' }}
            </h2>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-md">
            <p class="text-gray-500">Tarefas Concluídas</p>
            <h2 class="text-3xl font-bold text-gray-800">
                {{ $usuarios->sum('tarefas_concluidas') }}
            </h2>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-md">
            <p class="text-gray-500">Empresas Geridas</p>
            <h2 class="text-3xl font-bold text-gray-800">
                {{ $usuarios->sum('empresas_count') }}
            </h2>
        </div>

    </div>

    {{-- 🥇 Ranking --}}
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Ranking de Produtividade</h2>

        @php $rank = 1; @endphp

        @foreach($usuarios->sortByDesc('tarefas_concluidas') as $user)

        <div class="flex items-center justify-between py-3 border-b last:border-0">

            <div class="flex items-center gap-3">

                {{-- Ranking Badge --}}
                <div class="
                    w-8 h-8 flex items-center justify-center rounded-full text-white font-bold
                    {{ $rank == 1 ? 'bg-yellow-400' : '' }}
                    {{ $rank == 2 ? 'bg-gray-400' : '' }}
                    {{ $rank == 3 ? 'bg-orange-400' : '' }}
                    {{ $rank > 3 ? 'bg-gray-200 text-gray-700' : '' }}
                ">
                    {{ $rank }}
                </div>

                <span class="font-semibold text-gray-700">{{ $user->name }}</span>
            </div>

            <span class="text-gray-600 font-medium">
                {{ $user->tarefas_concluidas }} tarefas
            </span>

        </div>

        @php $rank++; @endphp
        @endforeach

    </div>

    {{-- 📊 Tabela --}}
    <div class="bg-white p-6 rounded-2xl shadow-md overflow-x-auto">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Detalhes</h2>

        <table class="w-full text-left">
            <thead>
                <tr class="border-b text-gray-500 text-sm">
                    <th class="py-2">Nome</th>
                    <th>Tarefas</th>
                    <th>Concluídas</th>
                    <th>Empresas</th>
                    <th>Produtividade</th>
                </tr>
            </thead>

            <tbody>
                @foreach($usuarios as $user)

                @php
                    $total = $user->tasks_count ?: 1;
                    $percent = ($user->tarefas_concluidas / $total) * 100;
                @endphp

                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="py-3 font-medium text-gray-700">{{ $user->name }}</td>
                    <td>{{ $user->tasks_count }}</td>
                    <td>{{ $user->tarefas_concluidas }}</td>
                    <td>{{ $user->empresas_count }}</td>

                    <td class="w-52">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="h-2 rounded-full bg-gradient-to-r from-[#feae1b] to-[#ff914d]"
                                 style="width: {{ $percent }}%">
                            </div>
                        </div>
                        <small class="text-gray-500">{{ number_format($percent, 1) }}%</small>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 📈 Gráfico --}}
<div class="bg-white p-6 rounded-2xl shadow-md">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Gráfico de Produtividade</h2>

    <div class="h-64"> {{-- 👈 controla altura aqui --}}
        <canvas id="chart"></canvas>
    </div>
</div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($usuarios->pluck('name')),
        datasets: [{
            label: 'Tarefas Concluídas',
            data: @json($usuarios->pluck('tarefas_concluidas')),
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
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#eee'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});
</script>

@endsection