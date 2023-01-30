@extends('auth.layout')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <form class='form-control mt-5 mb-5 p-3 shadow-lg' action="{{ route('login') }}" method="POST">

                    @csrf

                    <h4 class='text-center pb-4 fw-bold text-primary'>Login</h4>

                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            <h5>{!! \Session::get('msg') !!}</h5>
                        </div>
                    @endif

                    <div class='form-group mb-5'>
                        <label class='fw-bold text-success'>Email</label>
                        <input type="email" class='form-control shadow' name="email" />
                    </div>

                    <div class='form-group mb-5'>
                        <label class='fw-bold text-success'>Password</label>
                        <input type="password" class='form-control shadow' name="password" />
                    </div>

                    <div class='text-center mb-5'>
                        <button type='submit' class='btn btn-primary shadow-lg'>LOGIN</button>
                    </div>

                </form>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
@endsection
