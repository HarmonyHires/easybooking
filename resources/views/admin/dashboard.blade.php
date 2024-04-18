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
            <a class="btn btn-primary" href="{{ route('roles.index') }}">
                <i class="bi bi-person-fill-gear"></i> Manage Roles</a>
        @endcanany
        @canany(['create-user', 'edit-user', 'delete-user'])
            <a class="btn btn-success" href="{{ route('users.index') }}">
                <i class="bi bi-people"></i> Manage Users</a>
        @endcanany
        <p>&nbsp;</p>
    </div>
@endsection
