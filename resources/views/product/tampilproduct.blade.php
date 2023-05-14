@extends('dashboard')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Advanced Forms</div>
            </div>
        </div>

        <form action="/updateproduct/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Category</h4>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="productimage">Product Image</label>
                    </div>
                    <input type="file" name="product_image" id=""product_image>
                    <div class="formg-roup mb-3">
                        <img src="{{ asset('image/' . $data->product_image) }}" height="200px" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="Product Name" class="col-form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" value="{{ $data->product_name }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="product_category" class="col-form-label">Product Category</label>
                        <select class="form-control select" name="category_id" aria-label="Default select example">
                            <option selected>Select Category</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach

                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="Product Description" class="col-form-label">Product description</label>
                        <textarea class="form-control" name="product_description">{{ $data->product_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Product Price" class="col-form-label">Product Price</label>
                        <input type="text" class="form-control" name="product_price" value="{{ $data->product_price }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>

                </div>
            </div>
        </form>
    </section>
@endsection
