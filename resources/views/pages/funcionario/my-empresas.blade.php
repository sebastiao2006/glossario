@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')

<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">Empresas</h2>
    <p class="text-gray-500 mb-6">Empresas associadas ao funcionário</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse($empresas as $empresa)

            @php
                $reg = $empresa->regularizacoes->first();
            @endphp

            <!-- CARD EMPRESA -->
            <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col gap-4">

                <!-- HEADER -->
                <div class="flex items-center gap-4">
                    <div class="bg-orange-100 text-orange-500 p-3 rounded-xl">
                        <i class="bi bi-building text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-lg text-gray-800">
                            {{ $empresa->nome }}
                        </h3>
                        <span class="text-sm text-gray-400">Empresa</span>
                    </div>
                </div>

                <!-- INFO -->
                <div class="text-sm text-gray-600 space-y-1">
                    <p><strong>NIF:</strong> {{ $empresa->nif ?? '---' }}</p>
                    <p><strong>Telefone:</strong> {{ $empresa->telefone ?? '---' }}</p>
                    <p><strong>Localização:</strong> {{ $empresa->endereco ?? '---' }}</p>
                </div>

                <!-- ACTIONS -->
                <div class="flex flex-wrap gap-2 pt-2">

                    <button onclick="openModal({{ $empresa->id }})"
                        class="bg-orange-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-orange-600">
                        Regularizar
                    </button>

                    <button onclick="openViewModal({{ $empresa->id }})"
                        class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-blue-600">
                        Detalhes
                    </button>

                    <button onclick="openEditModal({{ $empresa->id }})"
                        class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-xs hover:bg-yellow-600">
                        Editar
                    </button>

                </div>

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

                                <!-- SITUAÇÃO -->
                                <label class="text-sm font-medium">Situação</label>
                                <select name="situacao"
                                        class="w-full border p-2 rounded mb-3">
                                    <option value="em_andamento">Em andamento</option>
                                    <option value="finalizada">Finalizada</option>
                                </select>

                                <!-- OBSERVAÇÃO -->
                                <label class="text-sm font-medium">Observação da empresa</label>
                                <textarea name="observacao"
                                        class="w-full border p-2 rounded mb-3"
                                        placeholder="Escreva observações..."></textarea>

                                <!-- CHECKLIST -->
                                <label class="text-sm font-medium">Checklist</label>

                                <div id="checklist-{{ $empresa->id }}" class="mb-3 space-y-2">

                                    <div class="flex gap-2">
                                        <input type="text"
                                            name="checklist[]"
                                            class="w-full border p-2 rounded text-sm"
                                            placeholder="Item">

                                        <button type="button"
                                                onclick="addChecklist({{ $empresa->id }})"
                                                class="bg-gray-100 hover:bg-gray-200 px-3 rounded text-sm">
                                            +
                                        </button>
                                    </div>

                                </div>

                                <!-- DOCUMENTOS -->
                                <label class="text-sm font-medium">Documentos</label>

                                <label class="flex items-center justify-center border-2 border-dashed rounded-lg p-4 cursor-pointer hover:bg-gray-50 mb-4">
                                    <input type="file" name="documentos[]" multiple class="hidden">
                                    <span class="text-sm text-gray-500">Clique ou arraste ficheiros aqui</span>
                                </label>

                                <!-- BOTÕES -->
                                <div class="flex justify-end gap-2">

                                    <button type="button"
                                            onclick="closeModal({{ $empresa->id }})"
                                            class="px-4 py-2 bg-gray-300 rounded">
                                        Cancelar
                                    </button>

                                    <button type="submit"
                                            class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                                        Enviar
                                    </button>

                                </div>

                            </form>

                        </div>
            </div>

            <!-- ================= VER DETALHES ================= -->

            <div id="view-modal-{{ $empresa->id }}"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">

                <div class="bg-white w-[600px] p-6 rounded-xl">

                    <h3 class="text-lg font-bold mb-4">Detalhes da Regularização</h3>

                    @if($reg)

                        <p><strong>Situação:</strong>
                            <span class="capitalize">{{ $reg->situacao }}</span>
                        </p>

                        <p class="mt-3"><strong>Observação:</strong></p>
                        <p class="text-gray-600">{{ $reg->observacao ?? 'Sem observação' }}</p>

                        <p class="mt-3"><strong>Checklist:</strong></p>
                        <ul class="list-disc ml-5 text-sm">
                            @foreach(json_decode($reg->checklist ?? '[]', true) as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>

                        <p class="mt-3"><strong>Documentos:</strong></p>
                        <ul class="ml-5 text-sm">
                            @foreach(json_decode($reg->documentos ?? '[]', true) as $doc)
                                <li>
                                    <a href="{{ asset('storage/'.$doc) }}"
                                    target="_blank"
                                    class="text-blue-500 hover:underline">
                                        Abrir documento
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

                    <form method="POST"
                        action="{{ route('funcionario.update.regularizacao', $empresa->id) }}"
                        enctype="multipart/form-data">

                        @csrf

                        <!-- SITUAÇÃO -->
                        <label class="text-sm font-medium">Situação</label>
                        <select name="situacao"
                                class="w-full border p-2 rounded mb-3">
                            <option value="em_andamento" {{ ($reg->situacao ?? '') == 'em_andamento' ? 'selected' : '' }}>
                                Em andamento
                            </option>
                            <option value="finalizada" {{ ($reg->situacao ?? '') == 'finalizada' ? 'selected' : '' }}>
                                Finalizada
                            </option>
                        </select>

                        <!-- OBSERVAÇÃO -->
                        <label class="text-sm font-medium">Observação</label>
                        <textarea name="observacao"
                                class="w-full border p-2 rounded mb-3">{{ $reg->observacao ?? '' }}</textarea>

                        <!-- CHECKLIST -->
                        <label class="text-sm font-medium">Checklist</label>

                        <div id="edit-checklist-{{ $empresa->id }}" class="mb-3 space-y-2">

                            @php
                                $checklist = json_decode($reg->checklist ?? '[]', true);
                            @endphp

                            @forelse($checklist as $item)
                                <div class="flex gap-2">
                                    <input type="text"
                                        name="checklist[]"
                                        value="{{ $item }}"
                                        class="w-full border p-2 rounded text-sm">
                                </div>
                            @empty
                                <input type="text"
                                    name="checklist[]"
                                    class="w-full border p-2 rounded text-sm"
                                    placeholder="Item">
                            @endforelse

                        </div>

                        <!-- NOVOS DOCUMENTOS -->
                        <label class="text-sm font-medium">Adicionar documentos</label>

                        <label class="flex items-center justify-center border-2 border-dashed rounded-lg p-4 cursor-pointer hover:bg-gray-50 mb-4">
                            <input type="file" name="documentos[]" multiple class="hidden">
                            <span class="text-sm text-gray-500">Adicionar novos ficheiros</span>
                        </label>

                        <!-- BOTÕES -->
                        <div class="flex justify-end gap-2">

                            <button type="button"
                                    onclick="closeEditModal({{ $empresa->id }})"
                                    class="px-4 py-2 bg-gray-300 rounded">
                                Cancelar
                            </button>

                            <button type="submit"
                                    class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                                Atualizar tudo
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        @empty
            <p class="text-gray-400 text-sm">Nenhuma empresa atribuída.</p>
        @endforelse

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

function addChecklist(id) {
    const container = document.getElementById('checklist-' + id);

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'checklist[]';
    input.className = 'w-full border p-2 rounded mt-2';
    input.placeholder = 'Item do checklist';

    container.appendChild(input);
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