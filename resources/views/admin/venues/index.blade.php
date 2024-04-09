@extends('admin.layouts.app')

@section('content-header')
    <div class="content-header">
        <div class="px-3 container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">Venues</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">venues</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Manage Venue</div>
        <div class="card-body">
            <a href="{{ route('venues.create') }}" class="my-2 btn btn-success btn-sm"><i class="bi bi-plus-circle"></i>
                Add
                New Venue</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Images</th>
                        <th scope="col">Venue Name</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($venues as $venue)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $venue->images }}</td>
                            <td>{{ $venue->name }}</td>
                            <td>{{ $venue->email }}</td>
                            <td>{{ $venue->status }}</td>
                            <td>
                                <form action="{{ route('venues.destroy', $venue->slug) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('venues.show', $venue->slug) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('venues.edit', $venue->slug) }}" class="btn btn-primary btn-sm"><i
                                            class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Do you want to delete this venue?');"><i
                                            class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>No venue Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>

            {{ $venues->links() }}

        </div>
    </div>
@endsection
