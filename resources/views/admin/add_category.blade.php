@extends('admin.layout')

@section('title', 'Add Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
                <h4 class="text-center text-primary mb-4 fw-bold">Add Category</h4>
                <form action="{{ route('categoryStore') }}" method="POST" enctype="multipart/form-data" class="form-control shadow-lg">
                    @csrf

                    <div class="form-group mb-4">
                        <label class="text-primary mb-2 fw-bold">Name</label>
                        <input type="text" class="form-control shadow-lg" name="name">
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-primary mb-2 fw-bold">Image</label>
                        <input type="file" class="form-control shadow-lg" name="image">
                    </div>

                    <div class="text-end p-2">
                        <button class="btn btn-primary ">Add</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
