<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Auth;
use DB;
use Request;

class RequestController extends Controller
{

    public function showSent() {
        $sentRequests = $this->getSentRequests();

        return view('home',compact('sentRequests'));
    }

    public function store($id) {
        $requestSent = DB::table('requests')->insert([
            'user_id' => Auth::id(),
            'user_request_id' => $id,
            'connected' => 0,  // Bolean variable. 0 for not connected and 1 for connected.
        ]);

        return (new HomeController)->index();
    }

    public function getSentRequests() {
        // MANAGING SENT REQUESTS
        // I took the users that sent me a request. Excluding also my own user id.
        $id = Auth::id();
        
        $ids = DB::table('requests')->where('connected', '=', '0')->select('requests.user_id')->get();
        $sentRequests = DB::table('users')->whereIn('user.id', [$ids])->where('id', '!=', $id)->get();

        return $sentRequests;
    }


}
