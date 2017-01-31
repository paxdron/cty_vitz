<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		Session::flash('error','La sesión ya fue iniciada');
        return view('main');
    }
}
