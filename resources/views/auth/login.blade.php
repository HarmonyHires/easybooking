@extends('layouts.app')

@section('content')
    <div aria-colindex="1" aria-label="content" class="mt-0 pt-10 mb-0" id="login">
        <div class="flex justify-content-center w-full justify-center">
            <div class="card bg-base-200 outline outline-1 outline-base-content/25 rounded-sm w-full max-w-xl">
                <div class="card-title mx-auto mt-10">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="font-normal flex flex-col gap-3">
                        @csrf

                        <div class="flex flex-col">
                            <label for="email"
                                class="md:text-lg text-base font-normal text-left">{{ __('E-Mail Address') }}</label>

                            <div class="w-full flex flex-col">
                                <input id="email" type="email"
                                    class="input rounded-sm transzition-all !outline-2 !outline-offset-2 input-bordered w-full{{ $errors->has('email') ? ' input-error' : '' }}"
                                    name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <div role="alert" class="alert alert-error mt-3 py-[6px] rounded-sm w-fit font-normal">
                                        <div>{{ $errors->first('email') }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="password"
                                class="md:text-lg text-base font-normal text-left">{{ __('Password') }}</label>

                            <div class="w-full flex flex-col">
                                <input id="password" type="password"
                                    class="input rounded-sm transition-all !outline-2 !outline-offset-2 input-bordered w-full{{ $errors->has('password') ? ' input-error' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                    <div role="alert" class="alert alert-error mt-3 py-[6px] rounded-sm w-fit font-normal">
                                        <div>{{ $errors->first('password') }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-col items-center">
                            <label class="label cursor-pointer gap-4">
                                <input type="checkbox" class="checkbox rounded-sm bg-base-300 text-neutral-50"
                                    name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="label-text">{{ __('Remember Me') }}</span>
                            </label>
                        </div>

                        <div class="flex flex-col items-center gap-3 mt-5">
                            <button type="submit"
                                class="btn btn-primary w-full min-w-min max-w-[10rem] rounded-sm text-neutral-50 dark:text-neutral-950">
                                {{ __('Login') }}
                            </button>
                        </div>
                        {{-- <div class="divider"></div>
                        <p class="text-center mb-3">
                            Or Login with
                        </p>
                        @include('partials.socials-icons') --}}

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
