@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                    style="width: 60px; height: 60px; font-size: 24px;">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div>
                    <h3 class="mb-0">{{ auth()->user()->name }}</h3>
                    <small class="text-muted">{{ auth()->user()->cargo }}</small>
                </div>
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <div class="p-3 border rounded-3">
                        <strong>Email:</strong>
                        <div>{{ auth()->user()->email }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3">
                        <strong>Idade:</strong>
                        <div>{{ auth()->user()->idade }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3">
                        <strong>ID Funcionário:</strong>
                        <div>{{ auth()->user()->id_funcionario }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3">
                        <strong>Computador:</strong>
                        <div>{{ auth()->user()->numero_computador }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3">
                        <strong>Senha Computador:</strong>
                        <div class="text-danger fw-bold">
                            {{ auth()->user()->senha_computador }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded-3">
                        <strong>Fim do Contrato:</strong>
                        <div>
                            <span class="badge bg-warning text-dark">
                                {{ auth()->user()->fim_contrato }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection