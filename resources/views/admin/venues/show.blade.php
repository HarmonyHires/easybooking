@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Venue Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('venues.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Venue
                                Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $venue->name }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Description</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $venue->description ?? 'null' }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email
                                Venue</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $venue->email }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="phone" class="col-md-4 col-form-label text-md-end text-start"><strong>Phone
                                Number</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $venue->phone }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="city"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>City</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $venue->city }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Category</strong></label>
                        {{-- @forelse ($category as $cat)
                            <div class="col-md-6" style="line-height: 35px;">
                                <span class="badge bg-primary">{{ $cat->id == $categories->id }}</span>
                            </div>
                        @empty

                        @endforelse --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
