<div class="admin-navbar">
    <div>
        <h5 class="mb-0 fw-bold">Painel Administrativo</h5>
        <small class="text-muted">Gerencie o conteúdo do sistema</small>
    </div>

    <div class="d-flex align-items-center gap-3">
        <span class="fw-semibold">
            Olá, {{ auth()->user()->name ?? 'Admin' }}
        </span>

        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
             style="width: 42px; height: 42px;">
            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Sair
            </button>
        </form>
    </div>
</div>