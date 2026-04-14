<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.Login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return redirect()->route('login')
                ->withErrors(['email' => 'Invalid credentials. Please try again.'])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        return redirect()->route('Dashboard')->with('success', 'You have successfully logged in!');

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out!');
    }
}
