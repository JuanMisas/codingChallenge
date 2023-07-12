<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;
use DB;

class SuggestionController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::id();
        $suggestions = DB::table('users')->leftJoin('requests', 'users.id', '=', 'requests.user_id')->get();

        return view('home',compact('suggestions'));
    }
}
