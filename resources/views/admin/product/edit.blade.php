@extends('admin.layout.main_layout')

@section('title', 'Update Product')

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Update Product({{ $product->name }})</h4>

                    <form action="{{ route('admin.product.update', $product) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-2">
                                <label>Product Name</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" autocomplete="off"
                                    value="{{ $product->name }}">
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
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
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
                                <input type="number" step="0.01" min="0" name="price" class="form-control"
                                    value="{{ $product->price }}">
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
                                <input type="number" step="0.01" min="0" name="disc_price" class="form-control"
                                    value="{{ $product->discount_price }}">
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
                                <textarea name="description" id="tinymce" class="form-control">{{ $product->description }}</textarea>
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
                                <img id="image_preview" src="{{ $product->getImg() }}" alt="image"
                                    style="max-width: 100%;">
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input type="submit" value="Update Product" class="btn btn-primary">
                            </div>
                        </div>

                    </form>

                    <form action="{{ route('admin.product.destroy', $product) }}" method="post" id="deleteForm">
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
