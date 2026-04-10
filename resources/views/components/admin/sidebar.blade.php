<div class="admin-sidebar w-64 min-h-screen text-white bg-gradient-to-b from-[#feae1b] to-[#feae1b] shadow-xl p-4">
    <a href="{{ route('admin.dashboard') }}" class="brand">
        Glossario Fiscal  & Contas
    </a>

<nav class="flex flex-col gap-2">

    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
       {{ request()->routeIs('admin.dashboard') 
           ? 'bg-white text-[#ff914d] shadow-md' 
           : 'text-white hover:bg-white/20' }}">
        <i class="bi bi-grid-fill"></i> Dashboard
    </a>

    <a href="{{ route('admin.users.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
       {{ request()->routeIs('admin.users.*') 
           ? 'bg-white text-[#ff914d] shadow-md' 
           : 'text-white hover:bg-white/20' }}">
        <i class="bi bi-people-fill"></i> Funcionários
    </a>

    <a href="{{ route('admin.tasks.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
       {{ request()->routeIs('admin.tasks.*') 
           ? 'bg-white text-[#ff914d] shadow-md' 
           : 'text-white hover:bg-white/20' }}">
        <i class="bi bi-list-task"></i> Tarefas
    </a>

    <a href="{{ route('admin.settings.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
       {{ request()->routeIs('admin.settings.*') 
           ? 'bg-white text-[#ff914d] shadow-md' 
           : 'text-white hover:bg-white/20' }}">
        <i class="bi bi-gear-fill"></i> Configurações
    </a>

    <a href="{{ route('admin.empresas.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
       {{ request()->routeIs('admin.empresas.*') 
           ? 'bg-white text-[#ff914d] shadow-md' 
           : 'text-white hover:bg-white/20' }}">
        <i class="bi bi-building"></i> Empresas
    </a>

    <a href="{{ route('admin.documents.index') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
       {{ request()->routeIs('admin.documents.*') 
           ? 'bg-white text-[#ff914d] shadow-md' 
           : 'text-white hover:bg-white/20' }}">
        <i class="bi bi-folder2-open"></i> Documentos
    </a>

    <a href="{{ route('admin.produtividade') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
       {{ request()->routeIs('admin.produtividade') 
           ? 'bg-white text-[#ff914d] shadow-md' 
           : 'text-white hover:bg-white/20' }}">
        <i class="bi bi-graph-up"></i> Produtividade
    </a>

    <hr class="border-white/30 my-4">

    <a href="{{ route('site.home') }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium text-white hover:bg-white/20 transition">
        <i class="bi bi-arrow-left-circle-fill"></i> Voltar ao Site
    </a>

</nav>
</div>