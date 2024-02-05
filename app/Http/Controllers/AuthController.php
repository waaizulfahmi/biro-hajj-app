<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hajj;


class AuthController extends Controller
{
    public function login()
    {
        if (auth()->guard('web')->check())


            return redirect()->route('home');
        return view('login');
    }

    public function register()
    {
        return view('sign-up');
    }
    // register guard web


    // login guard web
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->guard('web')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['error' => 'Gagal login']);
    }

    // logout guard web
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('login');
    }

    public function home()
    {
        $hajjCount = Hajj::count();


        return view('home',  compact('hajjCount'));
    }

}
