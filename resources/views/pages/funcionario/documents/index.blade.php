@extends('layouts.admin.app')

@section('title', 'Documentos')

@section('content')

<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">📁 Documentos</h1>
        <p class="text-gray-500 text-sm">Gerenciamento de documentos por empresa</p>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($empresas as $empresa)

        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition h-full flex flex-col">

            <!-- HEADER CARD -->
            <div class="flex justify-between items-center p-4 border-b">

                <div class="font-semibold text-gray-800">
                    {{ $empresa->nome }}
                </div>

                <span class="px-3 py-1 text-sm rounded-full font-semibold"
                      style="background-color: #feae1b20; color: #feae1b;">
                    {{ $empresa->documents->count() }}
                </span>
            </div>

            <!-- BODY -->
            <div class="p-4 flex-1 space-y-2">

                @if($empresa->documents->count())

                    @foreach($empresa->documents as $doc)

                    <div class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-50 transition">

                        <!-- INFO -->
                        <div class="flex items-center gap-2">

                            <div class="w-8 h-8 flex items-center justify-center rounded-lg"
                                 style="background-color: #feae1b20;">
                                📄
                            </div>

                            <span class="text-sm text-gray-700 font-medium">
                                {{ $doc->titulo }}
                            </span>

                        </div>

                        <!-- ACTIONS -->
                        <div class="flex gap-2">

                            <!-- VER -->
                            <a href="{{ asset('storage/' . $doc->file_path) }}"
                               target="_blank"
                               class="text-xs px-3 py-1 rounded-lg border font-medium hover:bg-gray-100 transition">
                                Ver
                            </a>

                            <!-- DOWNLOAD -->
                            <a href="{{ asset('storage/' . $doc->file_path) }}"
                               download
                               class="text-xs px-3 py-1 rounded-lg text-white font-medium transition"
                               style="background-color: #feae1b;">
                                ↓
                            </a>

                        </div>

                    </div>

                    @endforeach

                @else

                    <!-- EMPTY -->
                    <div class="flex flex-col items-center justify-center text-gray-400 py-6 text-sm">
                        <div class="text-2xl mb-2">📂</div>
                        Nenhum documento disponível
                    </div>

                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection