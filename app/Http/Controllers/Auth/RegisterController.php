<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();
        User::create($request->all());
        return redirect('/login')->with('msg', 'Cuenta creada inicie sesión');
    }
}
