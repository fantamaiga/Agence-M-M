<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            // Regenerate session on successful login
            $request->session()->regenerate();
            
            return redirect()->intended(route('admin.propriete.index'));
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects',
        ])->onlyInput('email');
    }

    /**
     * Handle logout.
     */
    public function logout()
    {
        Auth::logout();

        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }
}
