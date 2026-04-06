@extends('layouts.admin.app')

@section('title', 'Documentos')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Documentos</h3>
            <small class="text-muted">Gerenciamento de documentos por empresa</small>
        </div>
    </div>

    <!-- GRID -->
    <div class="row g-4">

        @foreach($empresas as $empresa)

        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm h-100">

                <!-- HEADER -->
                <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                    <div class="fw-semibold text-dark">
                        {{ $empresa->nome }}
                    </div>

                    <span class="badge bg-light text-dark border">
                        {{ $empresa->documents->count() }}
                    </span>
                </div>

                <!-- BODY -->
                <div class="card-body pt-2">

                    @if($empresa->documents->count())

                        @foreach($empresa->documents as $doc)

                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">

                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted">📄</span>
                                <span class="small text-dark">{{ $doc->titulo }}</span>
                            </div>

                            <div class="d-flex gap-2">

                                <!-- VER -->
                                <a href="{{ asset('storage/' . $doc->file_path) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-light border">
                                    Ver
                                </a>

                                <!-- DOWNLOAD -->
                                <a href="{{ asset('storage/' . $doc->file_path) }}"
                                   download
                                   class="btn btn-sm btn-dark">
                                    Download
                                </a>

                            </div>

                        </div>

                        @endforeach

                    @else

                        <div class="text-center text-muted py-4 small">
                            Nenhum documento disponível
                        </div>

                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection