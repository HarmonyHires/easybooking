@extends('admin.layouts.app')

@section('content-header')
    <div class="content-header">
        <div class="px-3 container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Manage Users</div>
        <div class="card-body">
            @can('create-user')
                <a href="{{ route('users.create') }}" class="my-2 btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Add
                    New
                    User</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @forelse ($user->getRoleNames() as $role)
                                    <span class="badge bg-primary">{{ $role }}</span>
                                @empty
                                    <span class="badge bg-primary">User</span>
                                @endforelse
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-eye"></i> Show</a>

                                    @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []))
                                        @if (Auth::user()->hasRole('Super Admin'))
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-pencil-square"></i> Edit</a>
                                        @endif
                                    @else
                                        @can('edit-user')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-pencil-square"></i> Edit</a>
                                        @endcan

                                        @can('delete-user')
                                            @if (Auth::user()->id != $user->id)
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Do you want to delete this user?');"><i
                                                        class="bi bi-trash"></i> Delete</button>
                                            @endif
                                        @endcan
                                    @endif

                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5">
                            <span class="text-danger">
                                <strong>No User Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>

            {{ $users->links() }}

        </div>
    </div>

@endsection
