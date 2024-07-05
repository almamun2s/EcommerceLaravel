@extends('admin.layout.main_layout')

@section('title', 'Create Product')

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Create Product</h4>

                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label>Product Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" autocomplete="off"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label>Category</label>
                            </div>
                            <div class="col-md-4">
                                <select name="category" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label>Regular Price</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" step="0.01" min="0" name="price" class="form-control">
                                @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label>Discount Price</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" step="0.01" min="0" name="disc_price" class="form-control">
                                @error('disc_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label>Description</label>
                            </div>
                            <div class="col-md-4">
                                <textarea name="description" id="tinymce" class="form-control"></textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label>Image</label>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <img id="image_preview" src="{{ asset('uploads/no_image.jpg') }}" alt="image"
                                    style="max-width: 100%;">
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input type="submit" value="Create Product" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })

        });
    </script>
@endsection
