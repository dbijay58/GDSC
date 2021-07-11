<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
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
    public function index()
    {
        $user_details = Auth::user();
        //dd(Auth::user()->bookings);
        if ($user_details->is_admin == 1){
        return redirect('/admin');
    }
    return view('home',['user_details' => $user_details, 'user_bookings' => Auth::user()->bookings]);
    }
}
