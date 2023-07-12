<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use View;   

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
        $id = Auth::id();
        // I took the users that have no requests with my user. Excluding also my own user id.
        $suggestions = DB::table('users')->join('requests', 'requests.user_id', '=', 'users.id', 'left outer')->select('users.id', 'users.name', 'users.email')->where('users.id', '!=', $id)->get();
        
        return view('home', compact('suggestions', 'id'));
    }

    // public function _invoke() 
    // {
    //     $id = Auth::id();
    //     $suggestions = DB::table('users')->leftJoin('requests', 'users.id', '=', 'requests.user_id')->get();   
    //     return view('home',
    // }
}
