@extends('admin.layout.main_layout')

@section('title', 'Update Category')

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Update Category({{ $category->name }})</h4>

                    <form action="{{ route('admin.category.update', $category) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-2">
                                <label>Category Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" autocomplete="off"
                                    value="{{ $category->name }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input type="submit" value="Update Category" class="btn btn-primary">
                            </div>
                        </div>

                    </form>

                    <form action="{{ route('admin.category.destroy', $category) }}" method="post" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <div class="row mt-4">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-danger" id="delete" value="Delete">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
