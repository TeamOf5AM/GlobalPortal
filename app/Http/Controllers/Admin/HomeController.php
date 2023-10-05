<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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
        return view(RouteServiceProvider::AdminDashboard.'/dashboard');
    }

    public function user()
    {
        return view(RouteServiceProvider::AdminUser.'/users');
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
        return view('admin.auth.login');
        }
    }
}
