@extends('admin.layouts.app')

@section('content-header')
    <div class="content-header">
        <div class="px-3 container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">categories</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Manage Category</div>
        <div class="card-body">
            <a href="{{ route('categories.create') }}" class="my-2 btn btn-success btn-sm"><i class="bi bi-plus-circle"></i>
                Add
                New Category</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->slug) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('categories.show', $category->slug) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-primary btn-sm"><i
                                            class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Do you want to delete this category?');"><i
                                            class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4">
                            <span class="text-danger">
                                <strong>No Category Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>

            {{ $categories->links() }}

        </div>
    </div>
@endsection
