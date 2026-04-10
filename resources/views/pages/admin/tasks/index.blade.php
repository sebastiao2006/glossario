@extends('layouts.admin.app')

@section('title', 'Tarefas')

@section('content')

<div class="p-6 space-y-6 bg-gray-100 min-h-screen">

    {{-- Header + botão --}}
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Tarefas</h1>

        <button data-bs-toggle="modal" data-bs-target="#taskModal"
            class="px-4 py-2 rounded-lg text-white shadow-md
                   bg-gradient-to-r from-[#feae1b] to-[#ff914d] hover:opacity-90 transition">
            + Nova Tarefa
        </button>
    </div>

    {{-- Filtro --}}
    <form method="GET" class="flex items-center gap-3">
        <select name="user_id"
            onchange="this.form.submit()"
            class="px-3 py-2 rounded-lg border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300">

            <option value="">Todos os funcionários</option>

            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </form>

    {{-- 📊 Tabela --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-left">

                {{-- Header --}}
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-sm">
                        <th class="px-4 py-3">Tarefa</th>
                        <th>Funcionário</th>
                        <th>Empresa</th>
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Status</th>
                        <th>Prazo</th>
                    </tr>
                </thead>

                {{-- Body --}}
                <tbody>
                    @foreach($tasks as $task)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $task->titulo }}
                        </td>

                        <td class="text-gray-600">
                            {{ $task->user->name }}
                        </td>

                        <td class="text-gray-600">
                            {{ $task->empresa->nome }}
                        </td>

                        <td class="text-gray-500">
                            {{ $task->data_inicio }}
                        </td>

                        <td class="text-gray-500">
                            {{ $task->data_fim }}
                        </td>

                        {{-- Status --}}
                        <td>
                            <span class="px-3 py-1 text-xs rounded-full text-white font-bold {{ $task->status_formatado['classe'] }}">
                                {{ $task->status_formatado['texto'] }}
                            </span>
                        </td>

                        {{-- Prazo --}}
                        <td>
                            @if($task->prazo_formatado)
                                <span class="px-3 py-1 text-xs rounded-full text-white font-bold {{ $task->prazo_formatado['classe'] }}">
                                    {{ $task->prazo_formatado['texto'] }}
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs rounded-full bg-gray-200 text-gray-600">
                                    Sem prazo
                                </span>
                            @endif
                        </td>

                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</div>

{{-- 🧾 MODAL --}}
<div class="modal fade" id="taskModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-2xl">

            {{-- Header --}}
            <div class="modal-header border-0">
                <h5 class="modal-title font-semibold">Nova Tarefa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.tasks.store') }}" method="POST">
                @csrf

                {{-- Body --}}
                <div class="modal-body grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-600">Funcionário</label>
                        <select name="user_id" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300">
                            <option value="">Selecionar</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Empresa</label>
                        <select name="empresa_id" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300">
                            <option value="">Selecionar</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Título</label>
                        <input type="text" name="titulo"
                               class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm text-gray-600">Descrição</label>
                        <textarea name="descricao"
                                  class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300"></textarea>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Data Início</label>
                        <input type="date" name="data_inicio"
                               class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Data Fim</label>
                        <input type="date" name="data_fim"
                               class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-300">
                    </div>

                </div>

                {{-- Footer --}}
                <div class="modal-footer border-0">

                    <button type="button"
                        class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit"
                        class="px-4 py-2 rounded-lg text-white shadow-md
                               bg-gradient-to-r from-[#feae1b] to-[#ff914d] hover:opacity-90 transition">
                        Guardar
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

@endsection