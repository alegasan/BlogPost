<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.Register');
    }

    public function store(RegisterRequest $request)
    {
        $request->validated();

        User::create($request->only(['name', 'email', 'password']));

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');

    }
}
