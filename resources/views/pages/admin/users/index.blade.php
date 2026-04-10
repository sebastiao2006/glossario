@extends('layouts.admin.app')

@section('title', 'Usuários')

@section('content')

<div class="p-6 space-y-6 bg-gray-100 min-h-screen">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Usuários</h1>
            <p class="text-gray-500">Gerencie todos os usuários cadastrados.</p>
        </div>

        <a href="{{ route('admin.users.create') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg text-white shadow-md
                  bg-gradient-to-r from-[#feae1b] to-[#ff914d] hover:opacity-90 transition">
            <i class="bi bi-plus-lg"></i> Novo Usuário
        </a>
    </div>

    {{-- 📊 Tabela --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-left">

                {{-- Header --}}
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-sm">
                        <th class="px-4 py-3">ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th class="text-end pr-4">Ações</th>
                    </tr>
                </thead>

                {{-- Body --}}
                <tbody>
                    @forelse($users as $user)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="px-4 py-3 font-medium text-gray-700">
                            {{ $user->id }}
                        </td>

                        <td class="font-medium text-gray-800">
                            {{ $user->name }}
                        </td>

                        <td class="text-gray-600">
                            {{ $user->email }}
                        </td>

                        {{-- Tipo --}}
                        <td>
                            @if($user->role === 'admin')
                                <span class="px-3 py-1 text-xs rounded-full text-white bg-gradient-to-r from-[#feae1b] to-[#ff914d]">
                                    Admin
                                </span>
                            @elseif($user->role === 'funcionario')
                                <span class="px-3 py-1 text-xs rounded-full bg-gray-200 text-gray-700">
                                    Funcionário
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-600">
                                    {{ $user->role }}
                                </span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td>
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                Ativo
                            </span>
                        </td>

                        {{-- Ações --}}
                        <td class="text-end pr-4">
                            <div class="flex justify-end gap-2">

                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="px-3 py-1 text-sm rounded-lg border border-gray-300 hover:bg-gray-100 transition">
                                    Editar
                                </a>

                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 text-sm rounded-lg border border-red-300 text-red-600 hover:bg-red-50 transition">
                                        Excluir
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">
                            Nenhum usuário encontrado
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection