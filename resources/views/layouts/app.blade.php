<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    @include('layouts.partials.head')

    <title>
        @hasSection('template_title')
            @yield('template_title') |
        @endif {{ config('app.name', Lang::get('titles.app')) }}
    </title>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
    <div class="sidebar-nav">
        <input id="sidebar-nav" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col gap-0">
            <!-- Navbar -->
            @include('layouts.partials.nav')
            <!-- Content -->
            @hasSection('content')
                @yield('content')
            @endif
            @include('layouts.partials.footer')
        </div>
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')
    </div>
    @include('layouts.partials.script')
    @yield('script')
</body>

</html>
