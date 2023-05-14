@extends('dashboard')
@section('content')
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('createproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Product Image" class="col-form-label">Product Image</label>
                            <input type="file" class="form-control" name="product_image">
                        </div>
                        <div class="mb-3">
                            <label for="Product Name" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name">
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
                            <textarea class="form-control" name="product_description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Product Price" class="col-form-label">Product Price</label>
                            <input type="text" class="form-control" name="product_price">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal end --}}

    <section class="section">
        <div class="section-header">
            <h1>Product Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Table</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Item</h4>

                        </div>
                        <div class="px-4">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-primary">Add product</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Product Image</th>
                                        {{-- <th>Category</th> --}}
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Product Price</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('image/' . $item->product_image) }}" style="width: 100px"
                                                    alt="">
                                            </td>
                                            {{-- <td>{{ $item->category_name }}</td> --}}

                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->product_description }}</td>
                                            <td>Rp {{ number_format($item->product_price) }}</td>

                                            {{-- <td>
                                            <div class="badge badge-success">Active</div>
                                        </td> --}}
                                            <td class="">
                                                <a href="/tampilproduct/{{ $item->id }}"
                                                    class="btn btn-success mb-2">Edit</a>
                                                <a href="/destroyproduct/{{ $item->id }}"
                                                    class="btn btn-warning">Delete</a>

                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        {{-- Modal start --}}

        {{-- modal end --}}

    </section>
@endsection
< <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
