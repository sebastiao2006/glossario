@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')

<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">My Empresas</h2>

    <div class="bg-white rounded-2xl shadow-md p-6">

        <div class="flex flex-wrap gap-4">

            @forelse($empresas as $empresa)

                @php
                    $reg = $empresa->regularizacoes?->last();
                @endphp

                <div class="px-4 py-3 rounded-xl text-sm font-medium border flex items-center gap-3"
                     style="background-color:#feae1b20; color:#feae1b;">

                    <span>{{ $empresa->nome }}</span>

                    <!-- BOTÃO REGULARIZAR -->
                    <button
                        onclick="openModal({{ $empresa->id }})"
                        class="bg-orange-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-orange-600">
                        Regularizar empresa
                    </button>

                    <!-- VER DETALHES -->
                    <button
                        onclick="openViewModal({{ $empresa->id }})"
                        class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-blue-600">
                        Ver detalhes
                    </button>

                    <!-- EDITAR -->
                    <button
                        onclick="openEditModal({{ $empresa->id }})"
                        class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-yellow-600">
                        Editar
                    </button>

                    <!-- FINALIZAR -->
                    <form action="{{ route('funcionario.finalizar', $empresa->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-green-600 text-white px-3 py-1 rounded-lg text-xs hover:bg-green-700">
                            Empresa Finalizada
                        </button>
                    </form>

                </div>

                <!-- ================= REGULARIZAR MODAL ================= -->
                <div id="modal-{{ $empresa->id }}"
                     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

                    <div class="bg-white w-[600px] p-6 rounded-xl shadow-lg">

                        <h3 class="text-lg font-bold mb-4">
                            Regularizar: {{ $empresa->nome }}
                        </h3>

                        <form action="{{ route('funcionario.regularizar.store', $empresa->id) }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <label class="text-sm font-medium">Situação atual</label>
                            <textarea name="situacao"
                                      class="w-full border p-2 rounded mb-3"
                                      required></textarea>

                            <label class="text-sm font-medium">Checklist</label>

                            <div id="checklist-{{ $empresa->id }}" class="mb-3">

                                <div class="flex gap-2 mb-2">
                                    <input type="text" name="checklist[]" class="w-full border p-2 rounded"
                                           placeholder="Item do checklist">

                                    <button type="button"
                                            onclick="addChecklist({{ $empresa->id }})"
                                            class="bg-gray-200 px-3 rounded">
                                        +
                                    </button>
                                </div>

                            </div>

                            <label class="text-sm font-medium">Documentos</label>
                            <input type="file" name="documentos[]" multiple class="w-full mb-4">

                            <div class="flex justify-end gap-2">

                                <button type="button"
                                        onclick="closeModal({{ $empresa->id }})"
                                        class="px-4 py-2 bg-gray-300 rounded">
                                    Cancelar
                                </button>

                                <button type="submit"
                                        class="px-4 py-2 bg-orange-500 text-white rounded">
                                    Enviar
                                </button>

                            </div>

                        </form>

                    </div>
                </div>

                <!-- ================= VER DETALHES MODAL ================= -->
                <div id="view-modal-{{ $empresa->id }}"
                     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

                    <div class="bg-white w-[600px] p-6 rounded-xl">

                        <h3 class="text-lg font-bold mb-4">Detalhes da Regularização</h3>

                        @if($reg)

                            <p><strong>Situação:</strong> {{ $reg->situacao }}</p>

                            <p class="mt-3"><strong>Checklist:</strong></p>
                            <ul class="list-disc ml-5">
                                @foreach(json_decode($reg->checklist ?? '[]', true) as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>

                            <p class="mt-3"><strong>Documentos:</strong></p>
                            <ul class="list-disc ml-5">
                                @foreach(json_decode($reg->documentos ?? '[]', true) as $doc)
                                    <li>
                                        <a href="{{ asset('storage/'.$doc) }}" target="_blank" class="text-blue-500">
                                            Ver documento
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        @else
                            <p class="text-gray-400">Sem registos ainda.</p>
                        @endif

                        <button onclick="closeViewModal({{ $empresa->id }})"
                                class="mt-4 bg-gray-300 px-4 py-2 rounded">
                            Fechar
                        </button>

                    </div>
                </div>

                <!-- ================= EDIT MODAL ================= -->
                <div id="edit-modal-{{ $empresa->id }}"
                     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

                    <div class="bg-white w-[600px] p-6 rounded-xl">

                        <h3 class="text-lg font-bold mb-4">Editar Regularização</h3>
                            <form method="POST" action="{{ route('funcionario.update.regularizacao', $empresa->id) }}">
                                @csrf

                                <!-- SITUAÇÃO -->
                                <label class="text-sm font-medium">Situação</label>
                                <textarea name="situacao" class="w-full border p-2 rounded mb-3">
                                    {{ $reg->situacao ?? '' }}
                                </textarea>

                                <!-- CHECKLIST -->
                                <label class="text-sm font-medium">Checklist</label>

                                <div id="edit-checklist-{{ $empresa->id }}" class="mb-3">

                                    @php
                                        $checklist = json_decode($reg->checklist ?? '[]', true);
                                    @endphp

                                    @foreach($checklist as $item)
                                        <div class="flex gap-2 mb-2">
                                            <input type="text" name="checklist[]"
                                                value="{{ $item }}"
                                                class="w-full border p-2 rounded">

                                            <button type="button"
                                                    onclick="addEditChecklist({{ $empresa->id }})"
                                                    class="bg-gray-200 px-3 rounded">
                                                +
                                            </button>
                                        </div>
                                    @endforeach

                                    <!-- Caso não tenha nada -->
                                    @if(empty($checklist))
                                        <div class="flex gap-2 mb-2">
                                            <input type="text" name="checklist[]"
                                                class="w-full border p-2 rounded"
                                                placeholder="Item do checklist">

                                            <button type="button"
                                                    onclick="addEditChecklist({{ $empresa->id }})"
                                                    class="bg-gray-200 px-3 rounded">
                                                +
                                            </button>
                                        </div>
                                    @endif

                                </div>

                                <button class="bg-orange-500 text-white px-4 py-2 rounded">
                                    Atualizar
                                </button>
                            </form>

                        <button onclick="closeEditModal({{ $empresa->id }})"
                                class="mt-2 bg-gray-300 px-4 py-2 rounded">
                            Fechar
                        </button>

                    </div>
                </div>

            @empty
                <p class="text-gray-400 text-sm">Nenhuma empresa atribuída.</p>
            @endforelse

        </div>

    </div>

</div>

<!-- ================= JS ================= -->
<script>
function openModal(id) {
    document.getElementById('modal-' + id).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById('modal-' + id).classList.add('hidden');
}

function addChecklist(id) {
    const container = document.getElementById('checklist-' + id);

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'checklist[]';
    input.className = 'w-full border p-2 rounded mt-2';
    input.placeholder = 'Item do checklist';

    container.appendChild(input);
}

function openViewModal(id) {
    document.getElementById('view-modal-' + id).classList.remove('hidden');
}

function closeViewModal(id) {
    document.getElementById('view-modal-' + id).classList.add('hidden');
}

function openEditModal(id) {
    document.getElementById('edit-modal-' + id).classList.remove('hidden');
}

function closeEditModal(id) {
    document.getElementById('edit-modal-' + id).classList.add('hidden');
}
function addEditChecklist(id) {
    const container = document.getElementById('edit-checklist-' + id);

    const div = document.createElement('div');
    div.className = 'flex gap-2 mt-2';

    div.innerHTML = `
        <input type="text" name="checklist[]" class="w-full border p-2 rounded" placeholder="Item do checklist">
        <button type="button" onclick="addEditChecklist(${id})" class="bg-gray-200 px-3 rounded">+</button>
    `;

    container.appendChild(div);
}
</script>

@endsection