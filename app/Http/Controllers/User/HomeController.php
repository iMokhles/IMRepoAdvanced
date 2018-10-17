<?php

namespace App\Http\Controllers\User;

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
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }
    /**
     * redirect to dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect()
    {
        return redirect(route('user.home'));
    }
}