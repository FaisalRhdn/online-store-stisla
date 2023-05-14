@extends('dashboard')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Advanced Forms</div>
            </div>
        </div>

        <form action="/userupdate/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>User</h4>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label for="Product Name" class="col-form-label"> Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="Product Description" class="col-form-label">Product description</label>
                        <textarea class="form-control" name="email">{{ $data->email }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Product Price" class="col-form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>

                </div>
            </div>
        </form>
    </section>
@endsection
