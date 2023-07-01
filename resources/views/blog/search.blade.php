@extends('blog.layout')

@section('title', 'Portfolio Dev | Search')

@section('content')
    <div class="container mt-4">
        <h1 class="text-primary">Posts</h1>
        <h5 class="text-secondary"></h5>
        <hr class="shadow">
        @if (empty($searchs[0]))
            <div class="d-flex align-items-center justify-content-center" style="height: 60vh;">
                <h1 class="text-center">No hay nada aqui</h1>
            </div>
        @else
            <div class="row mt-5">
                @foreach ($searchs as $search)
                    <div class="col-md-4 mb-5">
                        <div class="card shadow-lg">
                            <img src="{{ asset('storage') . '/' . $search->image }}" class="card-img" alt="..."
                                height="400px" style="object-fit: cover;object-position: 50% 10%;">
                            <div class="card-img-overlay text-end">
                                <div class="card-body position-absolute bottom-0 end-0">
                                    <h5 class="card-title text-white fs-4 fw-bolder"
                                        style="text-shadow: -10px 10px 20px black">
                                        {{ $search->description }}
                                    </h5>
                                    <a href="{{ route('postView', $search->id) }}"
                                        class="btn btn-success btn-sm shadow-lg">Visitar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
