@extends('blog.layout')

@section('title', 'Portfolio Dev | Inicio')

@section('content')
    <div class="container">
        <div class="mt-5">
            <h1 class="text-primary">Reciente</h1>
            <h5 class="text-secondary">Posts Recientes</h5>
            <hr class="shadow-lg">
            <div class="row">
                @foreach ($recents as $recent)
                    <div class="col-md-4 mb-5">
                        <div class="card shadow-lg">
                            <img src="{{ asset('storage') . '/' . $recent->image }}" class="card-img" alt="..."
                                height="400px" style="object-fit: cover;object-position: 50% 10%;">
                            <div class="card-img-overlay text-end">
                                <div class="card-body position-absolute bottom-0 end-0">
                                    <h5 class="card-title text-white fs-4 fw-bolder"
                                        style="text-shadow: -10px 10px 20px black">
                                        {{ $recent->description }}
                                    </h5>
                                    <p class="card-text">
                                        <small class=" fw-bolder text-white">
                                            {{ \Carbon\Carbon::parse($recent->created_at)->diffForHumans() }}
                                        </small>
                                    </p>
                                    <a href="{{ route('postView', $recent->id) }}" class="btn btn-success btn-sm shadow-lg">Saber más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-5">
            <h1 class="text-primary">Popular</h1>
            <h5 class="text-secondary">Lo más popular</h5>
            <hr class="shadow">
            @foreach ($populars as $popular)
                <div class="card mb-5 shadow-lg">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage') . '/' . $popular->image }}" class="card-img" alt="..."
                                height="300px" style="object-fit: cover;object-position: 50% 10%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-5">
                                <h3 class="card-title fs-3 fw-bolder text-primary">{{ $popular->name }}</h3>
                                <p class="card-text fs-5 fw-bolder text-secondary">
                                    {{ $popular->description }}
                                </p>

                                <a href="{{ route('postView', $popular->id) }}" class="btn btn-success shadow-lg p-2">Saber más</a>

                                <p class="card-text">
                                    <small class="float-end fw-bolder text-dark">
                                        <i class="fa-solid fa-heart"></i>
                                        {{ $popular->likes }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            <h1 class="text-primary">Categorias</h1>
            <h5 class="text-secondary">Explorar Categorias</h5>
            <hr class="shadow-lg">
            <a href="{{ route('categories') }}" class="btn btn-primary btn-lg mb-3 shadow-lg">Ver Más</a>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-5">
                        <div class="card shadow-lg">
                            <img src="{{ asset('storage') . '/' . $category->image }}" class="card-img" alt="..."
                                height="400px" style="object-fit: cover;object-position: 50% 10%;">
                            <div class="card-img-overlay">
                                <div class="card-body position-absolute bottom-0 end-90">
                                    <h5 class="card-title text-white fs-4 fw-bolder"
                                        style="text-shadow: -10px 10px 20px black">
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
    </div>
@endsection
