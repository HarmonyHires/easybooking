@extends('admin.layouts.app')

@section('content')
    <div class="w-full flex flex-wrap p-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="w-full">{{ __('You are logged in!') }}</div>

        <div class="w-full">This is your application dashboard.</div>
        @canany(['create-role', 'edit-role', 'delete-role'])
            <a class="btn btn-primary text-primary-content me-5" href="{{ route('roles.index') }}">
                <span class="icon-[ph--user-gear] text-2xl"></span> Manage Roles</a>
        @endcanany
        @canany(['create-user', 'edit-user', 'delete-user'])
            <a class="btn btn-accent text-accent-content" href="{{ route('users.index') }}">
                <span class="icon-[fluent--people-settings-20-regular] text-2xl"></span> Manage Users</a>
        @endcanany
    </div>
@endsection
