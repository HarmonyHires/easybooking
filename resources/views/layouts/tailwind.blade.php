<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    @include('layouts.partials.tailwind-head')

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

<body class="antialiased">
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col gap-0">
            <!-- Navbar -->
            @include('layouts.partials.tailwind-nav')
            <!-- Content -->
            @hasSection('content')
                @yield('content')
            @endif
            @include('layouts.partials.tailwind-footer')
        </div>
        <!-- Sidebar -->
        @include('layouts.partials.tailwind-sidebar')
    </div>
    @include('layouts.partials.tailwind-script')
    @yield('script')
</body>

</html>
