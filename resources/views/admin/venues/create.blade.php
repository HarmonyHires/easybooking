@extends('admin.layouts.app')

@section('content')
    <div class="py-3 row justify-content-center">
        <div class="col-md-8">

            <div class="p-3 card">
                <div class="card-header">
                    <div class="float-start">
                        Add New Venue
                    </div>
                    <div class="float-end">
                        <a href="{{ route('venues.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('venues.store') }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="ex: coder badminton club">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="images" class="col-md-4 col-form-label text-md-end text-start">Banner
                                Venue</label>
                            <div class="input-group col-md-6">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="images">Choose file</label>
                                    <input type="file" class="custom-file-input @error('images') is-invalid @enderror"
                                        id="images" name="images" value="{{ old('images') }}">
                                    @if ($errors->has('images'))
                                        <span class="text-danger">{{ $errors->first('images') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-end text-start">Phone
                                Number</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}" placeholder="ex: 082.....">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="city" class="col-md-4 col-form-label text-md-end text-start">City</label>
                            <div class="col-md-6">
                                <select class="form-control" name="city" id="city">
                                    <option value="Malang">Malang</option>
                                </select>
                                @if ($errors->has('city'))
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end text-start">Select Category</label>
                            <div class="col-md-6">
                                <select class="form-select @error('category_id') is-invalid @enderror" multiple aria-label="category_id" id="category_id" name="category_id[]" style="height: 110px; width: 100%">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}" {{ in_array($category->id, old('category_id') ?? []) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @empty
                                        <option value="">No Category Found</option>
                                    @endforelse
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Venue">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
