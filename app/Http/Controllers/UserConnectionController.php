<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserConnectionController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function showConnections() {
        $id = Auth::id();
        $connections = DB::table('users')->leftJoin('requests', 'users.id', '=', 'requests.user_id')->select('users.id', 'users.name', 'users.email')->where('users.id', '!=', $id)->get();

        return view('home',compact('connections'));
    }

    public function showConnectionsInCommon() {
        $id = Auth::id();
        $connectionsInCommon = DB::table('connections_in_common')->leftJoin('users', 'users.id', '=', 'connections_in_common.user_id')->select('users.id', 'users.name', 'users.email')->where('users.id', '!=', $id)->get();

        return view('home',compact('connectionsInCommon'));
    }

    public function destroy($id_connect) {
        $id = Auth::id();
        $request = Requests::table('connections_in_common')->where('user_id', '=', $id)->where('user_connect_id', '=', $id_connect)->first()->delete();

        return view('home');
    }
}
