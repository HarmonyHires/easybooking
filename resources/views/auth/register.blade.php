@extends('layouts.app')

@section('content')
    <div aria-colindex="1" aria-label="content" class="mt-0 pt-10 mb-0" id="register">
        <div class="flex justify-content-center w-full justify-center">
            <div class="card bg-base-200 outline outline-1 outline-base-content/25 rounded-sm w-full max-w-xl">
                <div class="card-title mx-auto mt-10">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="font-normal flex flex-col gap-3">
                        @csrf

                        <div class="flex flex-col">
                            <label for="name"
                                class="md:text-lg text-base font-normal text-left">{{ __('Username') }}</label>

                            <div class="w-full">
                                <input id="name" type="text"
                                    class="input rounded-sm transzition-all !outline-2 !outline-offset-2 input-bordered w-full{{ $errors->has('name') ? ' input-error' : '' }}"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <div role="alert"
                                        class="alert alert-error mt-3 py-[6px] rounded-sm w-fit font-normal">
                                        <div>{{ $errors->first('name') }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="email"
                                class="md:text-lg text-base font-normal text-left">{{ __('E-Mail Address') }}</label>

                            <div class="w-full">
                                <input id="email" type="email"
                                    class="input rounded-sm transzition-all !outline-2 !outline-offset-2 input-bordered w-full{{ $errors->has('email') ? ' input-error' : '' }}"
                                    name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <div role="alert"
                                        class="alert alert-error mt-3 py-[6px] rounded-sm w-fit font-normal">
                                        <div>{{ $errors->first('email') }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="password"
                                class="md:text-lg text-base font-normal text-left">{{ __('Password') }}</label>

                            <div class="w-full">
                                <input id="password" type="password"
                                    class="input rounded-sm transzition-all !outline-2 !outline-offset-2 input-bordered w-full{{ $errors->has('password') ? ' input-error' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                    <div role="alert"
                                        class="alert alert-error mt-3 py-[6px] rounded-sm w-fit font-normal">
                                        <div>{{ $errors->first('password') }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="password-confirm"
                                class="md:text-lg text-base font-normal text-left">{{ __('Confirm Password') }}</label>

                            <div class="w-full">
                                <input id="password-confirm" type="password"
                                    class="input rounded-sm transition-all !outline-2 !outline-offset-2 input-bordered w-full"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        @if (config('settings.reCaptchStatus'))
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4">
                                    <div class="g-recaptcha" data-sitekey="{{ config('settings.reCaptchSite') }}">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="flex sm:flex-row flex-col-reverse justify-center items-center gap-3 mt-5 w-full">
                            <a href="{{ route('welcome') }}"
                                class="btn dark:hover:bg-neutral-200 hover:bg-neutral-800 borders-none bg-base-content sm:w-1/3 w-full grow sm:max-w-[25%] min-w-min rounded-sm text-neutral-50 dark:text-neutral-950">{{ __('Back') }}</a>
                            <button type="submit"
                                class="btn btn-primary sm:w-1/3 w-full grow min-w-min rounded-sm text-neutral-50 dark:text-neutral-950">
                                {{ __('Register') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    @if (config('settings.reCaptchStatus'))
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif
@endsection
