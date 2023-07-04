<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validateUser = User::where('email', $request->email)->exists();
        if ($validateUser) {
            return redirect('/register')->with('msg', 'Este usuario ya existe')->withInput();
        } else {
            $request->validated();
            User::create($request->all());
            return redirect('/login')->with('msg', 'Cuenta creada inicie sesión')->withInput();
        }
    }
}
