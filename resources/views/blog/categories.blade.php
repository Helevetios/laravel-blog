@extends('blog.layout')

@section('title', 'Portfolio Dev | Categorias')

@section('content')
    <div class="container mt-4">
        <h1 class="text-primary">Categorias</h1>
        <h5 class="text-secondary">Todas las Categorias</h5>
        <hr class="shadow">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-5">
                    <div class="card shadow-lg">
                        <img src="{{ asset('storage') . '/' . $category->image }}" class="card-img" alt="..."
                            height="400px" style="object-fit: cover;object-position: 50% 10%;">
                        <div class="card-img-overlay">
                            <div class="card-body position-absolute bottom-0 end-90">
                                <h5 class="card-title text-white fs-4 fw-bolder" style="text-shadow: -10px 10px 20px black">
                                    {{ $category->name }}
                                </h5>
                                <button class="btn btn-success btn-sm shadow-lg">Explorar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
