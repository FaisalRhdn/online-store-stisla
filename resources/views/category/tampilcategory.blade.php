@extends('dashboard')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Advanced Forms</div>
            </div>
        </div>
        <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4>Category</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category_name" value="{{ $data->category_name }}" class="form-control ">
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>

            </div>
        </form>
    </section>
@endsection
