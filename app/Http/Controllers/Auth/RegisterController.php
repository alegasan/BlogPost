<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    }
}
