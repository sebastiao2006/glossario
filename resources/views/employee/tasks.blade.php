@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')
<div class="p-6 space-y-6">

    {{-- TÍTULO --}}
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Minhas Tarefas</h2>
    </div>

    {{-- CARD DA TABELA --}}
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Tarefa</th>
                        <th class="px-6 py-4">Empresa</th>
                        <th class="px-6 py-4">Data Início</th>
                        <th class="px-6 py-4">Data Fim</th>
                        <th class="px-6 py-4">Prazo</th>
                        <th class="px-6 py-4 text-center">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($tasks as $task)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $task->titulo }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $task->empresa->nome }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $task->data_inicio }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $task->data_fim }}
                            </td>

                            {{-- PRAZO --}}
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $task->prazo_formatado['classe'] }}">
                                    {{ $task->prazo_formatado['texto'] }}
                                </span>
                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap justify-center gap-2">

                                    {{-- PENDENTE --}}
                                    <form method="POST" action="{{ route('tasks.updateStatus', $task->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="pendente">

                                        <button type="submit"
                                            class="px-3 py-1 text-xs rounded-lg font-semibold transition 
                                            {{ $task->status == 'pendente' 
                                                ? 'bg-yellow-500 text-white' 
                                                : 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' }}">
                                            Pendente
                                        </button>
                                    </form>

                                    {{-- EM PROGRESSO --}}
                                    <form method="POST" action="{{ route('tasks.updateStatus', $task->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="em_progresso">

                                        <button type="submit"
                                            class="px-3 py-1 text-xs rounded-lg font-semibold transition 
                                            {{ $task->status == 'em_progresso' 
                                                ? 'bg-blue-600 text-white' 
                                                : 'bg-blue-100 text-blue-700 hover:bg-blue-200' }}">
                                            Em andamento
                                        </button>
                                    </form>

                                    {{-- CONCLUÍDA --}}
                                    <form method="POST" action="{{ route('tasks.updateStatus', $task->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="concluida">

                                        <button type="submit"
                                            class="px-3 py-1 text-xs rounded-lg font-semibold transition 
                                            {{ $task->status == 'concluida' 
                                                ? 'bg-green-600 text-white' 
                                                : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                                            Concluída
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                Nenhuma tarefa encontrada
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection