<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Kivula</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @include('partials.admin.styles')
</head>
<body>

    <div class="admin-wrapper">
        @if(auth()->user()->role === 'admin')
            @include('components.admin.sidebar')
        @elseif(auth()->user()->role === 'funcionario')
            @include('components.funcionario.sidebar')
        @endif

        <div class="admin-main">
            @include('components.admin.navbar')

            <div class="admin-content">
                @yield('content')
            </div>

            @include('components.admin.footer')
        </div>
    </div>

    @include('partials.admin.scripts')
</body>
</html>