<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Maildix - @yield('title')</title>
        @include('partials.head')
    </head>
    <body id="app-layout">
        {{-- ToDo : header section , different menu and footer... --}}
        {{-- navigation --}}
        @include('partials.menu')
        {{-- content --}}
        @yield('content')
        {{-- footer --}}
        @include('partials.footer')
        {{-- before body end : JS load , affilation , CDN ... --}}
        @include('partials.beforeBodyEnd')
    </body>
</html>