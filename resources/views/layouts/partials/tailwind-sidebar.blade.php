<div class="drawer-side z-50">
    <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="flex flex-col gap-2 p-8 w-80 max-w-full min-h-full bg-base-100 shadow-lg">
        <li class="w-full text-center font-bold text-xl">Portofolio</li>
        <li class="divider m-0"></li>
        <a aria-label="nav-link" href="{{ route('welcome') }}" class="nav-links justify-start"><span
                class="text-2xl icon-[ic--round-home]"></span> Homepage</a>
        @if (Route::currentRouteName() != 'welcome')
            @auth
                @role('admin')
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="nav-links w-full justify-start"><span
                                class="text-2xl icon-[bxs--edit]"></span> Action</div>
                        <ul tabindex="0"
                            class="menu dropdown-content z-[1] p-2 shadow bg-base-100 outline outline-primary outline-1 rounded w-52 mt-4">
                            <li><a class="dropdown-item {{ Request::is('roles') || Request::is('permissions') ? 'active' : null }}"
                                    href="{{ route('laravelroles::roles.index') }}">
                                    {!! trans('titles.laravelroles') !!}
                                </a></li>
                            <li><a class="dropdown-item {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null }}"
                                    href="{{ url('/users') }}">
                                    {!! trans('titles.adminUserList') !!}
                                </a></li>
                            <li><a class="dropdown-item {{ Request::is('users/create') ? 'active' : null }}"
                                    href="{{ url('/users/create') }}">
                                    {!! trans('titles.adminNewUser') !!}
                                </a></li>
                            <li><a class="dropdown-item {{ Request::is('themes', 'themes/create') ? 'active' : null }}"
                                    href="{{ url('/themes') }}">
                                    {!! trans('titles.adminThemesList') !!}
                                </a></li>
                            <li><a class="dropdown-item {{ Request::is('logs') ? 'active' : null }}"
                                    href="{{ url('/logs') }}">
                                    {!! trans('titles.adminLogs') !!}
                                </a></li>
                            <li><a class="dropdown-item {{ Request::is('activity') ? 'active' : null }}"
                                    href="{{ url('/activity') }}">
                                    {!! trans('titles.adminActivity') !!}
                                </a></li>
                            <li><a class="dropdown-item {{ Request::is('phpinfo') ? 'active' : null }}"
                                    href="{{ url('/phpinfo') }}">
                                    {!! trans('titles.adminPHP') !!}
                                </a></li>
                            <li><a class="dropdown-item {{ Request::is('routes') ? 'active' : null }}"
                                    href="{{ url('/routes') }}">
                                    {!! trans('titles.adminRoutes') !!}
                                </a></li>
                        </ul>
                    </div>
                @endrole
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="nav-links w-full justify-start"><span
                            class="text-2xl icon-[mdi--account-cog-outline]"></span> Account</div>
                    <ul tabindex="0"
                        class="menu dropdown-content z-[1] p-2 shadow bg-base-100 outline outline-primary outline-1 rounded w-52 mt-4">
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ trans('titles.login') }}</a></li>
                            @if (Route::has('register'))
                                <li><a class="nav-link" href="{{ route('register') }}">{{ trans('titles.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if (Auth::User()->profile && Auth::user()->profile->avatar_status == 1)
                                        <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}"
                                            class="user-avatar-nav">
                                    @else
                                        <div class="user-avatar-nav"></div>
                                    @endif
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item {{ Request::is('profile/' . Auth::user()->name, 'profile/' . Auth::user()->name . '/edit') ? 'active' : null }}"
                                    href="{{ url('/profile/' . Auth::user()->name) }}">
                                    {!! trans('titles.profile') !!}
                                </a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            @endauth
        @elseif (Route::has('login'))
            @auth
                <a aria-label="nav-link" href="{{ route('dashboard') }}" class="nav-links w-full justify-start"><span
                        class="text-2xl icon-[ep--menu]"></span> Dashboard</a>
            @else
                <a aria-label="nav-link" href="{{ route('login') }}" class="nav-links w-full justify-start"><span
                        class="text-2xl icon-[bi--box-arrow-in-right]"></span> Login</a>
            @endauth
        @endif
    </ul>
</div>
