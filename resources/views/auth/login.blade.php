@extends('auth.layout')

@section('title', 'Portfolio Dev | Login')

@section('content')
    <div class="position-fixed" style="top: 0; left: 0; margin: 10px;">
        <a href="/" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="container mt-3">
        <div class="row">

            <div class="col-1">

            </div>
            <div class="col-10">
                <form class='form-control mt-5 mb-5 p-3 shadow-lg' action="{{ route('login') }}" method="POST">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif

                    @csrf

                    <h4 class='text-center pb-4 fw-bold text-primary'>Login</h4>

                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            <h5>{!! \Session::get('msg') !!}</h5>
                        </div>
                    @endif

                    <div class='form-group mb-5'>
                        <label class='fw-bold text-success'>Email</label>
                        <input type="email" class='form-control shadow' name="email" value="{{ old('email') }}" />
                    </div>

                    <div class='form-group mb-5'>
                        <label class='fw-bold text-success'>Password</label>
                        <input type="password" class='form-control shadow' name="password" value="{{ old('password') }}" />
                    </div>

                    <div class='text-center mb-5'>
                        <button type='submit' class='btn btn-primary shadow-lg'>LOGIN</button>
                    </div>

                </form>
            </div>
            <div class="col-1">

            </div>
        </div>
    </div>
@endsection
