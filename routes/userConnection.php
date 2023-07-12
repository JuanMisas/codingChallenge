<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuggestionController;



Route::get("/suggestion", [SuggestionController::class, "show"]);
// Route::get("/sentRequests", [RequestController::class, "showSentRequests"]);
// Route::get("/receivedRequests", [RequestController::class, "showReceivedRequests"]);
// Route::get("/connections", [ConnectionController::class, "showConnections"]);
// Route::get("/connectionsInCommon", [ConnectionInCommonController::class, "showConnectionsInCommon"]);  
// Route::any("/sendRequest/{id}/", [RequestController::class, "store"]);
// Route::delete("/deleteRequest/{id}", [RequestController::class, "destroyRequest"]);
// Route::put("/acceptRequest/{id}", [RequestController::class, "update"]);
// Route::delete("/deleteConnection/{id}", [RequestController::class, "destroyConnection"]);


Route::resource("requests", "Requestcontroller");

// Route::get('suggestion', function () {

//     $suggestions = DB::table('users')->leftJoin('requests', 'users.id', '=', 'requests.user_id')->get();

//     return view("home", [
//         "suggestions" => $suggestions
//     ]);
// });

