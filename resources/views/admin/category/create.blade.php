@extends('admin.layout.main_layout')

@section('title', 'Create Category')

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Create Category</h4>

                    <form action="{{ route('admin.category.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label>Category Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" autocomplete="off" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input type="submit" value="Create Category" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
