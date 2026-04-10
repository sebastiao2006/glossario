@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')

<div class="p-6 space-y-6">

    <!-- TITLE -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800"> Dashboard Funcionário</h1>
        <p class="text-gray-500 text-sm">Resumo da sua atividade</p>
    </div>

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Total Tarefas -->
        <div class="rounded-2xl shadow-md p-5 text-white"
             style="background: linear-gradient(135deg, #feae1b, #ff914d);">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">Total de Tarefas</p>
                    <h2 class="text-3xl font-bold">
                        {{ $totalTarefas ?? 0 }}
                    </h2>
                </div>

                <i class="bi bi-list-task text-3xl opacity-80"></i>
            </div>

        </div>

        <!-- Pendentes -->
        <div class="bg-white rounded-2xl shadow-md p-5">

            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Tarefas Pendentes</p>
                    <h2 class="text-3xl font-bold text-gray-800">
                        {{ $tarefasPequenas->count() }}
                    </h2>
                </div>

                <div class="w-12 h-12 flex items-center justify-center rounded-xl"
                     style="background-color: #feae1b20;">
                    <i class="bi bi-clock text-xl" style="color:#feae1b;"></i>
                </div>
            </div>

        </div>

    </div>

    <!-- EMPRESAS -->
    <div class="bg-white rounded-2xl shadow-md p-6">

        <h3 class="font-semibold text-gray-800 mb-4"> Minhas Empresas</h3>

        <div class="flex flex-wrap gap-2">

            @forelse($empresas as $empresa)

                <span class="px-4 py-2 rounded-full text-sm font-medium"
                      style="background-color:#feae1b20; color:#feae1b;">
                    {{ $empresa->nome }}
                </span>

            @empty
                <p class="text-gray-400 text-sm">Nenhuma empresa atribuída.</p>
            @endforelse

        </div>

    </div>

    <!-- TAREFAS -->
    <div class="bg-white rounded-2xl shadow-md p-6">

        <h3 class="font-semibold text-gray-800 mb-4"> Minhas Tarefas</h3>

        <div class="space-y-3">

            @forelse($tarefas as $task)

                @php
                    $cor = match($task->status) {
                        'pendente' => '#f59e0b',
                        'em andamento' => '#3b82f6',
                        'concluída' => '#16a34a', // verde mais forte
                        default => '#16a34a'
                    };
                @endphp

                <div class="flex justify-between items-center p-4 rounded-xl border hover:shadow-md transition">

                    <!-- INFO -->
                    <div>
                        <p class="font-semibold text-gray-800">
                            {{ $task->titulo }}
                        </p>
                        <p class="text-xs text-gray-400">
                            Atualizado recentemente
                        </p>
                    </div>

                    <!-- STATUS -->
                    <span class="px-3 py-1 text-xs font-semibold rounded-full"
                          style="background-color: {{ $cor }}20; color: {{ $cor }};">
                        {{ ucfirst($task->status) }}
                    </span>

                </div>

            @empty

                <div class="text-center text-gray-400 py-6">
                     Sem tarefas atribuídas.
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection