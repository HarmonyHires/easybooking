@extends('admin.layouts.app')

@section('content-header')
    <div class="content-header">
        <div class="px-3 container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">Permissions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">permissions</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Permissions</div>
                <div class="card-body">
                    @can('create-permission')
                        <a href="{{ route('permissions.create') }}" class="my-2 btn btn-success btn-sm"><i
                                class="bi bi-plus-circle"></i>
                            Add New Permissions</a>
                    @endcan
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $permission)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('permissions.show', $permission->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>


                                            @can('edit-permissions')
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i
                                                        class="bi bi-pencil-square"></i>
                                                    Edit</a>
                                            @endcan

                                            @can('delete-permissions')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Do you want to delete this permission?');"><i
                                                        class="bi bi-trash"></i> Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="3">
                                    <span class="text-danger">
                                        <strong>No Permission Found!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
