<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg p-4">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel Blog</a>
            <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <form action="" method="POST" class="col-md-10 m-auto">
                    @csrf
                    <input type="text" class="form-control shadow-lg">
                </form>
                <ul class="navbar-nav me-auto">
                    <a class="btn btn-success mt-1" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        Menú
                    </a>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
