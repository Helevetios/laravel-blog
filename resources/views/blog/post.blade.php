@extends('blog.layout')

@section('title')
    Portfolio Dev | {{ $post->description }}
@endsection

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white"
        style="background-image:linear-gradient(rgba(0,0,0,0.25),rgba(0,0,0,0.25)),url('{{ asset('storage') . '/' . $post->image }}') ;background-size: cover; background-position: 10% 30%;">
        <div class="col-md-6 px-0">
            <h1 class="display-4" style="text-shadow: -10px 10px 20px rgb(54, 51, 51)">{{ $post->name }}
            </h1>
            <p class="lead my-3" style="text-shadow: -10px 10px 20px rgb(54, 51, 51)">{{ $post->description }}</p>
            @auth
                @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.like', $post->id) }}" method="post">
                        @csrf
                        <button
                            style="background-color: transparent; border: none; color: white; text-shadow: -10px 10px 20px rgb(54, 51, 51)"><i
                                class="m-2 lead my-3 fa-regular fa-heart"></i>{{ $post->likes }}</button>
                    </form>
                @else
                    <form action="{{ route('posts.unlike', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button
                            style="background-color: transparent; border: none; color: white; text-shadow: -10px 10px 20px rgb54, 51, 51)"><i
                                class="m-2 lead my-3 fa-solid fa-heart"></i>{{ $post->likes }}</button>
                    </form>
                @endif
            @endauth
            @guest
                <button
                    style="background-color: transparent; border: none; color: white; text-shadow: -10px 10px 20px rgb(54, 51, 51)"
                    onclick="mostrarMensaje()"><i class="m-2 lead my-3 fa-regular fa-heart"></i>{{ $post->likes }}</button>
            @endguest
        </div>
    </div>
    <div class="container mb-5">
        {!! $post->body !!}
    </div>
    <div id="mensaje" class="mensaje-emergente">
        <p>Por favor, inicie sesión</p>
        <button class="btn btn-primary" onclick="cerrarMensaje()">Cerrar</button>
    </div>
    <style>
        .text {
            color: rgb(90, 82, 113);
            font-size: 16px;
            line-height: 1.8;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        img {
            max-width: 100%;
            max-height: 100%;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
            justify-content: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .mensaje-emergente {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            z-index: 9999;
        }
    </style>
    <script>
        function mostrarMensaje() {
            document.getElementById("mensaje").style.display = "block";
        }

        function cerrarMensaje() {
            document.getElementById("mensaje").style.display = "none";
        }
    </script>
@endsection
