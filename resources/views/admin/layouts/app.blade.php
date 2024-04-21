<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    @include('admin.layouts.partials.head')

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

<body data-barba="wrapper" class="flex justify-center bg-base-200">
    <div id="main" class="drawer lg:drawer-open h-screen 2xl:container bg-base-100">
        <input id="sidebar-nav" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col h-full justify-between">
            <!-- Navbar -->
            @include('admin.layouts.partials.nav')
            <!-- Content -->
            <div class="w-full flex-1" data-barba="container"
                data-barba-namespace="{{ Route::getCurrentRoute()->getName() }}">
                @hasSection('content')
                    @yield('content')
                @endif
            </div>
            @include('admin.layouts.partials.footer')
        </div>
        <!-- Sidebar -->
        @include('admin.layouts.partials.sidebar')
    </div>
    @include('admin.layouts.partials.script')
    @yield('script')
</body>

</html>
