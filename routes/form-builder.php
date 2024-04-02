<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;




define('API_KEY',config('microservices.services.form_builder.api_key'));
define('BASE_URL',config('microservices.services.form_builder.base_url'));



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

// Route::post('/forms', function(Request $request) {
//    $response = Http::withHeaders([
//     'section_id' => 11,
//     'resource_group_id' => 17,
//     'created_by' => auth()->user()->id,
//     'api-key' => API_KEY
//  ])->post(BASE_URL."/forms",$request->all());
//    return response()->json(json_decode($response->body()),$response->status());
// })->middleware('auth','permission:create_form');

Route::post('/forms', function(Request $request) {
   $response = Http::withHeaders([
    'section_id' => 11,
    'user_collection_id' => auth('user')->user()->userCollection->id,
    'api-key' => API_KEY
 ])->post(BASE_URL."/forms",$request->all());
   return response()->json(json_decode($response->body()),$response->status());
})->middleware('auth:user');

Route::get('/forms', function(Request $request) {
    $response = Http::withHeaders([
        'user_collection_id' => auth('user')->user()->userCollection->id,
        'api-key' => API_KEY
    ])->get(BASE_URL."/forms",[]);
    return response()->json(json_decode($response->body()),$response->status());
})->middleware('auth:user');

Route::get('/forms/{id}', function(Request $request,$id) {
    $response = Http::withHeaders([
        'user_collection_id' => auth('user')->user()->userCollection->id,
        'api-key' => API_KEY
    ])->get(BASE_URL."/forms/$id",[]);
    return response()->json(json_decode($response->body()),$response->status());
})->middleware('auth:user');


