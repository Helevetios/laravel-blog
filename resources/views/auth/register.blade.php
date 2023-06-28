@extends('auth.layout')

@section('title', 'Portfolio Dev | Registro')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <form class='form-control mt-5 mb-5 p-3 shadow-lg' action="{{ route('register') }}" method="POST">

                    @csrf

                    <h4 class='text-center pb-4 fw-bold text-primary'>REGISTRATE</h4>

                    <div class='form-group mb-5'>
                        <label class='fw-bold text-success'>Name</label>
                        <input type="text" class='form-control shadow' name="name" />
                    </div>

                    <div class='form-group mb-5'>
                        <label class='fw-bold text-success'>Email</label>
                        <input type="email" class='form-control shadow' name="email" />
                    </div>

                    <div class='form-group mb-5'>
                        <label class='fw-bold text-success'>Password</label>
                        <input type="password" class='form-control shadow' name="password" />
                    </div>

                    <div class='text-center mb-5'>
                        <button type='submit' class='btn btn-primary shadow-lg'>REGISTRATE</button>
                    </div>

                </form>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
@endsection
