<div class="admin-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="brand">
        Kivula Admin
    </a>

    <nav class="nav flex-column">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> Dashboard
        </a>

        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i> Usuários
        </a>

{{--         <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text-fill"></i> Posts
        </a> --}}
        <a href="{{ route('admin.tasks.index') }}" class="nav-link">
            <i class="bi bi-list-task"></i> Tarefas
        </a>

        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="bi bi-gear-fill"></i> Configurações
        </a>
        
        <a href="{{ route('admin.empresas.index') }}" class="nav-link">
            <i class="bi bi-building"></i> Empresas
        </a>

        <hr class="text-secondary my-4">

        <a href="{{ route('site.home') }}" class="nav-link">
            <i class="bi bi-arrow-left-circle-fill"></i> Voltar ao Site
        </a>
    </nav>
</div>