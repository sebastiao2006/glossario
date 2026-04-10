<div class="admin-sidebar w-64 min-h-screen text-white bg-gradient-to-b from-[#feae1b] to-[#feae1b] shadow-xl p-4">

    <!-- Brand -->
    <a href="{{ route('funcionario.dashboard') }}"
       class="block text-lg font-bold mb-6">
        Kivula
    </a>

    <!-- Menu -->
    <nav class="flex flex-col gap-2">

        <!-- Dashboard -->
        <a href="{{ route('funcionario.dashboard') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
           {{ request()->routeIs('funcionario.dashboard') 
               ? 'bg-white text-[#ff914d] shadow-md' 
               : 'text-white hover:bg-white/20' }}">
            <i class="bi bi-grid-fill"></i> Dashboard
        </a>

        <!-- Empresas -->
        <a href="{{ route('funcionario.empresas.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
           {{ request()->routeIs('funcionario.empresas.*') 
               ? 'bg-white text-[#ff914d] shadow-md' 
               : 'text-white hover:bg-white/20' }}">
            <i class="bi bi-building-fill"></i> Empresas
        </a>

        <!-- Tarefas -->
        <a href="{{ route('funcionario.tarefas.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
           {{ request()->routeIs('funcionario.tarefas.*') 
               ? 'bg-white text-[#ff914d] shadow-md' 
               : 'text-white hover:bg-white/20' }}">
            <i class="bi bi-list-task"></i> Tarefas
        </a>

        <!-- Documentos -->
        <a href="{{ route('funcionario.documents.index') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
           {{ request()->routeIs('funcionario.documents.*') 
               ? 'bg-white text-[#ff914d] shadow-md' 
               : 'text-white hover:bg-white/20' }}">
            <i class="bi bi-folder2-open"></i> Documentos
        </a>
        <!-- My Empresas -->
        <a href="{{ route('funcionario.my-empresas') }}"
        class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
        {{ request()->routeIs('funcionario.my-empresas') 
            ? 'bg-white text-[#ff914d] shadow-md' 
            : 'text-white hover:bg-white/20' }}">
            
            <i class="bi bi-building"></i> My Empresas
        </a>

        <!-- Perfil -->
        <a href="{{ route('funcionario.perfil') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium transition
           {{ request()->routeIs('funcionario.perfil') 
               ? 'bg-white text-[#ff914d] shadow-md' 
               : 'text-white hover:bg-white/20' }}">
            <i class="bi bi-person-fill"></i> Meu Perfil
        </a>

        <!-- Divider -->
        <hr class="border-white/30 my-4">

        <!-- Voltar -->
        <a href="{{ route('site.home') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg font-medium text-white hover:bg-white/20 transition">
            <i class="bi bi-arrow-left-circle-fill"></i> Voltar ao Site
        </a>

    </nav>

</div>