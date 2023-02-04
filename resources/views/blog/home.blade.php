@extends('blog.layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="mt-5">
            <h1 class="text-primary">Reciente</h1>
            <h5 class="text-secondary">Últimas noticias</h5>
            <hr class="shadow-lg">
            <button type="submit" class="btn btn-primary btn-lg mb-3 shadow-lg">Ver Más</button>
            <div class="row">
                @foreach ($recents as $recent)
                    <div class="col-md-4 mb-5">
                        <div class="card shadow-lg">
                            <img src="{{ asset('storage') . '/' . $recent->image }}" class="card-img" alt="..."
                                height="400px" style="object-fit: cover;object-position: 20% 10%;">
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
                                    <button class="btn btn-success btn-sm shadow-lg">Saber más</button>
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
            <button type="submit" class="btn btn-primary btn-lg mb-3 shadow-lg">Ver Más</button>

            @foreach ($populars as $popular)
                <div class="card mb-5 shadow-lg">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage') . '/' . $popular->image }}" class="card-img" alt="..."
                                height="300px" style="object-fit: cover;object-position: 20% 10%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-5">
                                <h3 class="card-title fs-3 fw-bolder text-primary">{{ $popular->name }}</h3>
                                <p class="card-text fs-5 fw-bolder text-secondary">
                                    {{ $popular->description }}
                                </p>

                                <button class="btn btn-success shadow-lg p-2">Saber más</button>

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
            <button type="submit" class="btn btn-primary btn-lg mb-3 shadow-lg">Ver Más</button>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-5">
                        <div class="card shadow-lg">
                            <img src="{{ asset('storage') . '/' . $category->image }}" class="card-img" alt="..."
                                height="400px" style="object-fit: cover;object-position: 20% 10%;">
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

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title fs-2 fw-bolder" id="offcanvasExampleLabel">Menú</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @guest
                    <div class="mb-3">
                        Entra o registrate para guardar tus posts favoritos
                    </div>
                @endguest

                <div class="mb-3 ">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn btn-sm btn-primary mt-2">Search</button>
                </div>

                @auth
                    <div>
                        <div class="col-md-12">
                            <ul class="list-group shadow-lg">
                                @if (auth()->user()->role == '1')
                                    <a href="/admin"
                                        class="list-group-item list-group-item-action fw-bold text-primary">Administrar
                                        sitio</a>
                                @endif
                                <a href=""
                                    class="list-group-item list-group-item-action fw-bold text-primary">Guardado</a>
                                <a href="" class="list-group-item list-group-item-action fw-bold text-primary">Likes</a>
                                <a href="{{ route('logout') }}"
                                    class="list-group-item list-group-item-action fw-bold text-primary">Logout</a>
                            </ul>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="fw-bolder mt-3">Login and Register</h5>
                            <ul class="list-group mt-3">
                                <a class="list-group-item list-group-item-action fw-bold text-primary"
                                    href="{{ route('login.view') }}" style="text-decoration: none">Login</a>
                                <a class="list-group-item list-group-item-action fw-bold text-primary"
                                    href="{{ route('register.view') }}" style="text-decoration: none">Register</a>
                            </ul>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
@endsection
