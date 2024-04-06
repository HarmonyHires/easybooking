<div class="w-full z-50 navbar justify-center shadow-md py-4 lg:px-20 md:px-10 sticky top-0 bg-base-100">
    <div class="container flex">
        <div class="navbar-start">
            <div class="text-xl btn btn-ghost no-animation rounded-sm">{{ config('app.name', Lang::get('titles.app')) }}
            </div>
        </div>
        <div class="flex-none lg:hidden navbar-end items-center flex gap-2">
            <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-circle btn-ghost">
                <span class="icon-[heroicons-solid--menu-alt-3] text-2xl"></span>
            </label>
            <label class="swap swap-rotate btn btn-ghost btn-circle">
                <input type="checkbox" data-toggle-theme="dark,lightdim" data-act-class="ACTIVECLASS" />
                <span class="swap-on fill-current text-2xl icon-[ph--sun-duotone]"></span>
                <span class="swap-off fill-current text-2xl icon-[ph--moon-duotone]"></span>
            </label>
        </div>
        <div class="flex-none hidden lg:flex gap-3 navbar-end w-fit grow">
            <a aria-label="nav-link" href="{{ route('welcome') }}" class="nav-links">Homepage</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a href="{{ route('logout') }}" class="nav-links" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
            @if (Route::currentRouteName() != 'welcome')
                @auth
                    @role('admin')
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="nav-links">Action</div>
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
                        <div tabindex="0" role="button" class="nav-links">Account</div>
                        <ul tabindex="0"
                            class="menu dropdown-content z-[1] p-2 shadow bg-base-100 outline outline-primary outline-1 rounded w-52 mt-4">
                            @guest
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ trans('titles.login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="nav-link" href="{{ route('register') }}">{{ trans('titles.register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a class="flex justify-between" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                        @if (Auth::User()->profile && Auth::user()->profile->avatar_status == 1)
                                            <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}"
                                                class="user-avatar-nav">
                                        @else
                                            <div class="user-avatar-nav"></div>
                                        @endif
                                    </a>
                                </li>
                                <li><a class=" {{ Request::is('profile/' . Auth::user()->name, 'profile/' . Auth::user()->name . '/edit') ? 'active' : null }}"
                                        href="{{ url('/profile/' . Auth::user()->name) }}">
                                        {!! trans('titles.profile') !!}
                                    </a>
                                </li>
                                <li><a class="" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                @endauth
            @elseif (Route::has('login'))
                @auth
                    @if(Auth::user()->hasRole('Admin|Super Admin'))
                    <a aria-label="nav-link" href="{{ route('dashboard') }}" class="nav-links">Dashboard</a>
                    @else
                    <a aria-label="nav-link" href="{{ route('dashboard-user') }}" class="nav-links">Dashboard</a>
                    @endif
                @else
                    <a aria-label="nav-link" href="{{ route('login') }}" class="nav-links">Login</a>

                    @if (Route::has('register'))
                        <a aria-label="nav-link" href="{{ route('register') }}" class="nav-links">Register</a>
                    @endif
                @endauth
            @endif
            <label class="swap swap-rotate btn btn-ghost btn-circle">
                <input type="checkbox" data-toggle-theme="dark,lightdim" data-act-class="ACTIVECLASS" />
                <span class="swap-on fill-current text-2xl icon-[ph--sun-duotone]"></span>
                <span class="swap-off fill-current text-2xl icon-[ph--moon-duotone]"></span>
            </label>
        </div>
    </div>
</div>
