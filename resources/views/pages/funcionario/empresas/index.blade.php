@extends('layouts.admin.app')

@section('title', 'Empresas')

@section('content')

<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Empresas</h1>
        <p class="text-gray-500 text-sm">Empresas associadas ao funcionário</p>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($empresas as $empresa)

        <div class="bg-white rounded-2xl shadow-md p-5 hover:shadow-lg transition">

            <!-- TOP -->
            <div class="flex items-center justify-between mb-4">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12 flex items-center justify-center rounded-xl"
                         style="background-color:#feae1b20;">
                        <i class="bi bi-building text-xl" style="color:#feae1b;"></i>
                    </div>

                    <div>
                        <h2 class="font-semibold text-gray-800">
                            {{ $empresa->nome }}
                        </h2>
                        <p class="text-xs text-gray-400">
                            Empresa
                        </p>
                    </div>

                </div>

            </div>

            <!-- INFO -->
            <div class="space-y-2 text-sm text-gray-600">

                <p><strong>NIF:</strong> {{ $empresa->nif }}</p>
                <p><strong>Telefone:</strong> {{ $empresa->telefone }}</p>
                <p><strong>Localização:</strong> {{ $empresa->localizacao }}</p>

            </div>

        </div>

        @empty

        <!-- EMPTY -->
        <div class="col-span-full text-center text-gray-400 py-10">
            Nenhuma empresa encontrada.
        </div>

        @endforelse

    </div>

</div>

@endsection