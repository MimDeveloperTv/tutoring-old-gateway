<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;








// Route::any('/{path}', function(Request $request,$path) {
//     dd($request);
//    $response = Http::get('http://127.0.0.1:8000/'.$path);
//    return new Response($path, $response->status());
// })->middleware('');




// Route::get('/service2', function(Request $request) {
    
//    $bearer = $request->bearerToken();
//    $response = Http::withToken($bearer)->get('http://microservice-b/api/service');
//    return new Response($response->body(), $response->status());
// });

Route::post('/roles', function(Request $request) {
   $response = Http::withHeaders([
    'api_key' => config('microservices.services.permission.api_key')
 ])->post(config('microservices.services.permission.base_url')."/roles",[
      'owner_id' => auth('user')->user()->user_collection_id,
      'user_id' => auth('user')->user()->id,
      'name' => $request->name,
   ]);
   return response()->json(json_decode($response->body()),$response->status());
})->middleware(['auth:user','permission:admin']);