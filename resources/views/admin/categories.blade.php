@extends('admin.layout')

@section('title', 'Categories')

@section('content')
    <div class="container">

        <div class="table-responsive mt-3">
            <table class="table mb-5">
                <div class="text-end">
                    <a href="{{ route('categories.add.view') }}" class="btn btn-success mt-5">Add</a>
                </div>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div>
                                    <img src="{{ asset('storage') . '/' . $category->image }}" width="70px">
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('categoryUpdate', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('categoryDestroy', $category->id) }}" method="POST">
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
            {{ $categories->links() }}
        </div>
    </div>
@endsection
