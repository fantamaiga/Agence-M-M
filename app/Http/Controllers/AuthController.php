<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login()
    {
       
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
       $credentials = $request->validated();
       if (Auth::attempt($credentials)) {
        $reqest->session()->regenerate();
        return redirect()->intended(route('admin.propriete.index'));
       } 

       return back()->withErrors([
        'email' => 'Identifiants incorrect'
       ])->onlyInput('email');
    }

    public function lougout()
    {
        Auth::logout();
        return to_route('login')->with('Vous êtes maintenant déconnecté');
    }
}
