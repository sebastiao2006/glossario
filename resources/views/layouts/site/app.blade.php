<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @include('partials.site.styles')
</head>
<body>

    @include('components.site.header')

    <main>
        @yield('content')
    </main>
    
    @include('components.site.footer')

    @include('partials.site.scripts')
    
</body>
</html>