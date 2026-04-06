@extends('layouts.admin.app')

@section('title', 'Produtividade')

@section('content')

<div class="p-6 space-y-6">

    <h1 class="text-2xl font-bold"> Produtividade dos Funcionários</h1>

    {{-- 🔥 Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-gray-500">Total Funcionários</p>
            <h2 class="text-2xl font-bold">{{ count($usuarios) }}</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-gray-500">Mais Produtivo</p>
            <h2 class="text-lg font-bold">
                {{ $maisProdutivo->name ?? '-' }}
            </h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-gray-500">Tarefas Concluídas</p>
            <h2 class="text-2xl font-bold">
                {{ $usuarios->sum('tarefas_concluidas') }}
            </h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-gray-500">Empresas Geridas</p>
            <h2 class="text-2xl font-bold">
                {{ $usuarios->sum('empresas_count') }}
            </h2>
        </div>

    </div>

    {{-- 🥇 Ranking --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4"> Ranking de Produtividade</h2>

        @php
            $rank = 1;
        @endphp

        @foreach($usuarios->sortByDesc('tarefas_concluidas') as $user)
            <div class="flex items-center justify-between border-b py-2">

                <div class="flex items-center gap-2">
                    <span>
                        @if($rank == 1) 
                        @elseif($rank == 2) 
                        @elseif($rank == 3) 
                        @else {{ $rank }}
                        @endif
                    </span>

                    <strong>{{ $user->name }}</strong>
                </div>

                <span>{{ $user->tarefas_concluidas }} tarefas</span>
            </div>

            @php $rank++; @endphp
        @endforeach
    </div>

    {{-- 📊 Tabela com progresso --}}
    <div class="bg-white p-6 rounded-xl shadow overflow-x-auto">
        <h2 class="text-xl font-bold mb-4"> Detalhes</h2>

        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th>Nome</th>
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

                <tr class="border-b">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->tasks_count }}</td>
                    <td>{{ $user->tarefas_concluidas }}</td>
                    <td>{{ $user->empresas_count }}</td>

                    <td class="w-40">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: {{ $percent }}%"></div>
                        </div>
                        <small>{{ number_format($percent, 1) }}%</small>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 📈 Gráfico --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Gráfico de Produtividade</h2>

        <canvas id="chart"></canvas>
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
            }]
        }
    });
</script>

@endsection