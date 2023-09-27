<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboards.dashboard');
    }

    public function user()
    {
        return view('users.users');
    }
    
    public function login()
    {
        $logged_id = Auth::user()->id;
        if($logged_id > 0)
        {
            return redirect(RouteServiceProvider::DASHBOARD);
        }
        else
        {
            return view('auth.login');
        }
    }
}
