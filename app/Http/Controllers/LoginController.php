<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('home.admin');
            }else{
                return redirect()->route('home');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
