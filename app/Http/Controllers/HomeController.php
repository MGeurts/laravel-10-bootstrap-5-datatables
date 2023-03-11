<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            if (!session('APP')) {
                session(['APP.YEAR' => date('Y')]);
            }

            if (session('status')) {
                return view('back.home')->with('status', session('status'));
            }

            return view('back.home');
        } else {
            if (session('status')) {
                return view('front.home')->with('status', session('status'));
            }

            return view('front.home');
        }
    }
}
