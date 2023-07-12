<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use View;
use Auth;
use DB;

class RequestController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSentRequests()
    {
        $id = Auth::id();
        $sentRequests = DB::table('requests')->leftJoin('users', 'users.id', '=', 'requests.user_id')->select('users.id', 'users.name', 'users.email')->where('users.id', '!=', $id)->where('connect', '=', 0)->get();

        return view('home',compact('sentRequests'));
    }

    public function showReceivedRequests()
    {
        $id = Auth::id();
        $receivedRequests = DB::table('requests')->join('users', 'requests.user_id', '=', 'users.id', 'right outer')->select('users.id', 'users.name', 'users.email')->where('users.id', '!=', $id)->where('connect', '=', 0)->get();

        return view('home',compact('receivedRequests'));
    }

    public function store($request) {
        $id = Auth::id();
        // dd($request, $id);
        $request = Requests::table('requests')->create([
            'user_id' => $id,
            'user_request_id' => $request->request_id,
            'connected' => 0,  // Bolean variable. 0 for not connected and 1 for connected.
        ]);
        
        return view('home',compact('request'));
    }

    // This method will accept the request.
    public function update($id_request) {
        $id = Auth::id();
        $request = Requests::table('requests')->where('user_id', '=', $id)->where('user_id_request', '=', $id_request)->first()->update(['connect' => 1]);

        return view('home',compact('request'));
    }

    public function destroy($id_request) {
        $id = Auth::id();
        $request = Requests::table('requests')->where('user_id', '=', $id)->where('user_id_request', '=', $id_request)->first()->delete();

        return view('home');
    }
}
