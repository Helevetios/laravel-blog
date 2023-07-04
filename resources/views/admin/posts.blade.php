@extends('admin.layout')

@section('title', 'Posts')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="text-end">
                <a href="{{ route('add.post') }}" class="btn btn-success mt-5 mb-3">Add</a>
            </div>
            <div class="table-responsive mt-3">
                <table class="table mb-5 align-items-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Body</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td>
                                    <div>
                                        <img src="{{ asset('storage') . '/' . $post->image }}" width="70px">
                                    </div>
                                </td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    <a href="{{ route('postEdit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('postDelete', $post->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Estas seguro de borrar este elemento?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="float-end">
            </div>
        </div>
        <div class="pagination justify-content-center">
            {{ $posts->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection
