<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class SuggestionController extends Controller
{
    public function show() {
        $suggestions = $this->getSuggestions();

        return view('home',compact('suggestions'));
    }



    public function getSuggestions() {
        // MANAGING SUGGESTIONS
        // I took the users that have no requests with my user. Excluding also my own user id.
        $id = Auth::id();
        
        $id1 = DB::table('requests')->pluck('user_id')->all();
        $id2 = DB::table('requests')->pluck('user_request_id')->all();
        $suggestions = DB::table('users')->whereNotIn('id', $id2)->whereNotIn('id', $id2)->select('users.id', 'users.name', 'users.email')->where('id', '!=', $id)->get();

        return $suggestions;
    }
}
