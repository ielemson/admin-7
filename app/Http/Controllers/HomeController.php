<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $request->session()->flash('success','Testing Success ');
        // $request->session()->flash('warning','Testing Warning ');
        // $request->session()->flash('error','Testing Error ');
        return view('home');
    }
}
