@extends('layouts.admin.app')

@section('title', 'Funcionários & Empresas')

@section('content')

<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">Funcionários & Empresas</h2>

    <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">

        <table class="w-full text-sm">

            <thead>
                <tr class="bg-gray-100 text-left text-xs uppercase text-gray-600">
                    <th class="p-3">Empresa</th>
                    <th class="p-3">Responsável</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Detalhes</th>
                    <th class="p-3">Data</th>
                </tr>
            </thead>

            <tbody>

                @forelse($empresas as $empresa)

                    @php
                        $reg = $empresa->regularizacoes->last();
                    @endphp

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3 font-semibold">
                            {{ $empresa->nome }}
                        </td>

                        <td class="p-3">
                            {{ $empresa->user->name ?? 'Sem responsável' }}
                        </td>

                        {{-- STATUS --}}
                        <td class="p-3">
                            @if($reg && $reg->status == 'finalizada')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    Finalizada
                                </span>
                            @elseif($reg)
                               {{--  <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                    Em progresso
                                </span> --}}
                            @else
                                <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs">
                                    Sem registo
                                </span>
                            @endif
                        </td>

                        {{-- BOTÃO MODAL --}}
                        <td class="p-3">

                            <button
                                onclick="openModal({{ $empresa->id }})"
                                class="bg-gradient-to-r from-[#feae1b] to-[#ff914d] text-white px-4 py-1.5 rounded-lg text-xs font-semibold shadow-md hover:scale-105 transition">
                                Ver detalhes
                            </button>

                            {{-- DATA OCULTA --}}
                            <div id="data-{{ $empresa->id }}" class="hidden">

                                @if($reg)

                                    @php
                                        $docs = json_decode($reg->documentos ?? '[]', true);
                                        $checklist = json_decode($reg->checklist ?? '[]', true);
                                    @endphp

                                    <div class="overflow-x-auto">

                                        <table class="w-full border border-gray-200 rounded-lg overflow-hidden text-sm">

                                            <tbody>

                                                {{-- SITUAÇÃO --}}
                                                 <tr class="border-b">
                                                    <td class="p-3 bg-gray-50 font-semibold w-1/3">Situação</td>
                                                    <td class="p-3">{{ $reg->situacao }}</td>
                                                </tr> 

                                                {{-- CHECKLIST --}}
                                                <tr class="border-b">
                                                    <td class="p-3 bg-gray-50 font-semibold align-top">Checklist</td>
                                                    <td class="p-3">
                                                        <ul class="space-y-1 text-xs text-gray-600">
                                                            @foreach($checklist as $item)
                                                                <li>✔ {{ $item }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>

                                                {{-- DOCUMENTOS --}}
                                                <tr>
                                                    <td class="p-3 bg-gray-50 font-semibold align-top">Documentos</td>
                                                    <td class="p-3">

                                                        @if(!empty($docs))
                                                            @foreach($docs as $doc)
                                                                <a href="{{ asset('storage/' . $doc) }}"
                                                                   target="_blank"
                                                                   class="inline-flex items-center gap-2 bg-gradient-to-r from-[#feae1b] to-[#ff914d] text-white px-3 py-1 rounded-lg text-xs font-semibold shadow hover:scale-105 transition mr-2 mb-2">
                                                                    📄 Ver documento
                                                                </a>
                                                            @endforeach
                                                        @else
                                                            <span class="text-gray-400 text-xs">Sem documentos</span>
                                                        @endif

                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                @else
                                    <p class="text-gray-500">Sem registo disponível</p>
                                @endif

                            </div>

                        </td>

                        <td class="p-3 text-gray-400">
                            {{ $empresa->created_at->format('d/m/Y') }}
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-400">
                            Nenhuma empresa encontrada.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
</div>

{{-- MODAL --}}
<div id="modal" class="fixed inset-0 hidden bg-black/60 backdrop-blur-sm flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl p-6 relative border border-gray-100 animate-fadeIn">

        {{-- FECHAR --}}
        <button onclick="closeModal()"
                class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-100 text-gray-500 hover:text-red-600 transition">
            ✕
        </button>

        {{-- HEADER --}}
        <h2 class="text-2xl font-bold mb-5 bg-gradient-to-r from-[#feae1b] to-[#ff914d] text-transparent bg-clip-text">
            Detalhes da Empresa
        </h2>

        {{-- CONTEÚDO --}}
        <div id="modal-content" class="text-sm text-gray-700"></div>

        {{-- FOOTER --}}
        <div class="mt-6 flex justify-end">
            <button onclick="closeModal()"
                    class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm">
                Fechar
            </button>
        </div>

    </div>
</div>

{{-- SCRIPT --}}
<script>
    function openModal(id) {
        const content = document.getElementById('data-' + id).innerHTML;
        document.getElementById('modal-content').innerHTML = content;
        document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

    document.getElementById('modal').addEventListener('click', function(e){
        if(e.target === this){
            closeModal();
        }
    });
</script>

{{-- ANIMAÇÃO --}}
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

.animate-fadeIn {
    animation: fadeIn 0.2s ease-out;
}
</style>

@endsection