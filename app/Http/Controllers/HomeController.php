<?php

namespace App\Http\Controllers;

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
        if(auth()->user()->is_verified ){
            $role = Auth::user()->role;
            return view('dashboard', compact('role'));
        }else{
            return redirect()->route('otp.verify', ['email' => auth()->user()->email]);
        }
        
    }
}
