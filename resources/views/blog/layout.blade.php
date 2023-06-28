<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg p-4">
        <div class="container">
            <a class="navbar-brand" href="/">Portfolio Dev</a>
            <button class="navbar-toggler mb-3" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample"
                role="button" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <form action="" method="POST" class="col-md-10 m-auto mb-2">
                    @csrf
                    <input type="text" class="form-control shadow-lg mt-2">
                </form>

                <div class="m-auto text-center">
                    <a class="btn btn-lg btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
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
                            <a href="{{ route('likes') }}" class="list-group-item list-group-item-action fw-bold text-primary">Favoritos</a>
                            <a href="{{ route('logout') }}"
                                class="list-group-item list-group-item-action fw-bold text-primary">Logout</a>
                        </ul>
                    </div>
                </div>
            @endauth
            @guest
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="fw-bolder mt-3">Login y Registro</h5>
                        <ul class="list-group mt-3">
                            <a class="list-group-item list-group-item-action fw-bold text-primary"
                                href="{{ route('login.view') }}" style="text-decoration: none">Login</a>
                            <a class="list-group-item list-group-item-action fw-bold text-primary"
                                href="{{ route('register.view') }}" style="text-decoration: none">Registrate</a>
                        </ul>
                    </div>
                </div>
            @endguest
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
