@extends('layouts.admin.app')

@section('title', 'Documentos')

@section('content')

<div class="p-6 space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800"> Documentos</h1>

        <a href="{{ route('admin.documents.create') }}"
           class="px-5 py-2 rounded-xl shadow-md text-white font-semibold transition"
           style="background-color: #feae1b;">
            + Novo Documento
        </a>
    </div>

    <!-- Card Tabela -->
    <div class="bg-white rounded-2xl shadow-md p-6">

        <div class="overflow-x-auto">
            <table class="w-full text-left">

                <!-- Head -->
                <thead>
                    <tr class="text-gray-500 text-sm border-b">
                        <th class="pb-3">Título</th>
                        <th class="pb-3">Empresa</th>
                        <th class="pb-3">Ficheiro</th>
                        <th class="pb-3 text-right">Ação</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="text-gray-700">

                    @foreach($documents as $doc)
                    <tr class="border-b hover:bg-gray-50 transition">

                        <!-- Título -->
                        <td class="py-4 font-medium">
                            {{ $doc->titulo }}
                        </td>

                        <!-- Empresa -->
                        <td class="py-4">
                            {{ $doc->empresa->nome ?? '-' }}
                        </td>

                        <!-- Ficheiro -->
                        <td class="py-4">
                            <a href="{{ asset('storage/' . $doc->file_path) }}"
                               target="_blank"
                               class="text-sm font-semibold hover:underline"
                               style="color: #feae1b;">
                                Ver documento
                            </a>
                        </td>

                        <!-- Ações -->
                        <td class="py-4 text-right">
                            <form action="{{ route('admin.documents.destroy', $doc->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="px-3 py-1 text-sm rounded-lg bg-red-100 text-red-600 hover:bg-red-200 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <!-- Empty State -->
        @if($documents->isEmpty())
            <div class="text-center py-10 text-gray-400">
                Nenhum documento encontrado.
            </div>
        @endif

    </div>

</div>

@endsection