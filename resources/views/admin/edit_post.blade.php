@extends('admin.layout')

@section('title', 'Edit Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5 mb-5">
                <h4 class="text-center text-primary mb-4 fw-bold">Edit Post</h4>
                <form action="{{ route('edit.post', $post->id) }}" method="POST" enctype="multipart/form-data"
                    class="form-control shadow-lg">
                    @csrf

                    <div class="form-group mb-4">
                        <label class="text-primary mb-2 fw-bold">Name</label>
                        <input value="{{ $post->name }}" type="text" class="form-control shadow-lg" name="name">
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-primary mb-2 fw-bold">Image</label>
                        <input type="file" class="form-control shadow-lg" name="image">
                    </div>

                    <div>
                        <img src="{{ asset('storage') . '/' . $post->image }}" width="70px">
                    </div>

                    <div class="form-group mb-4 mt-3">
                        <label class="text-primary mb-2 fw-bold">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-primary mb-2 fw-bold">Descripcion</label>
                        <input value="{{ $post->description }}" type="text" class="form-control shadow-lg"
                            name="description">
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-primary mb-2 fw-bold">Body</label>
                        <textarea class="form-control" name="body" cols="30" rows="10">{{ $post->body }}</textarea>
                    </div>

                    <div class="text-end p-2">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
