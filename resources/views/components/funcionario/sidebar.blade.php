<div class="admin-sidebar">
    <a href="{{ route('funcionario.dashboard') }}" class="brand">
        Kivula
    </a>

    <nav class="nav flex-column">

        <a href="{{ route('funcionario.dashboard') }}" class="nav-link {{ request()->routeIs('funcionario.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> Dashboard
        </a> 
        <a href="{{ route('funcionario.empresas.index') }}" class="nav-link {{ request()->routeIs('funcionario.empresas') ? 'active' : '' }}">
            <i class="bi bi-building-fill"></i> Empresas
        </a>

        <a href="{{ route('funcionario.perfil') }}" class="nav-link {{ request()->routeIs('funcionario.perfil') ? 'active' : '' }}">
            <i class="bi bi-person-fill"></i> Meu Perfil
        </a>

    </nav>
</div>