<?php

use App\Models\User;
use App\Models\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Lib\Http\Request as CustomRequest;


/* -------------------- No Need To Auth  ---------------- */
Route::get('all-services',function(Request $request){
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/services",$request->all());
    return response()->json(json_decode($response->body()),$response->status());
});

/* -------------------- No Need To Auth  ---------------- */


/* -------------------- Auth  ---------------- */
Route::get('collection/services',function(Request $request){
    $user_colelction_id = '84b15c1f-7f0e-411e-9a0c-d5626653b751';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/collection/$user_colelction_id/services",[]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::post('collection/services',function(Request $request){
    $user_colelction_id = '84b15c1f-7f0e-411e-9a0c-d5626653b751';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->post(
        config('microservices.services.booking.base_url')."/collection/$user_colelction_id/services",
        [
            'form_id' => $request->form_id,
            'default_duration' => $request->default_duration,
            'default_price' => $request->default_price,
            'default_break' => $request->default_break,
            'default_capacity' => $request->default_capacity,
            'service_model_id' =>$request->service_model_id
        ]);
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('collection/addresses',function(Request $request){
    $user_collection_id = '84b15c1f-7f0e-411e-9a0c-d5626653b751';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/collection/{$user_collection_id}/addresses",[]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::get('collection/appointable-items',function(Request $request){
    $user_collection_id  = "84b15c1f-7f0e-411e-9a0c-d5626653b751";
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/collection/$user_collection_id/appointable-items",$request->all());
    return response()->json(json_decode($response->body()),$response->status());
});

Route::post('collection/addresses',function(Request $request){
    $user_collection_id = '84b15c1f-7f0e-411e-9a0c-d5626653b751';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->post(config('microservices.services.booking.base_url')."/collection/{$user_collection_id}/addresses",[
        'title' => $request->title,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'description' => $request->description,
        'phone' => $request->phone,
    ]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::post('operator/addresses',function(Request $request){
    $user_id ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->post(config('microservices.services.booking.base_url')."/operators/{$user_id}/addresses",[
        'title' => $request->title,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'description' => $request->description,
        'phone' => $request->phone,
    ]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::get('operator/addresses',function(Request $request){
    $user_id ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/operators/{$user_id}/addresses",[]);
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('operator/applications',function(Request $request){
    $user_id ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/operators/{$user_id}/applications",[]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::post('operator/applications',function(Request $request){
    $user_id ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->post(config('microservices.services.booking.base_url')."/operators/{$user_id}/applications",[
        'service_id' => $request->service_id,
        'form_id' => $request->form_id,
        'duration' => $request->duration,
        'price' => $request->price,
        'break' => $request->break,
        'capacity' => $request->capacity,
    ]);
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('operator/application-places/{applicationId}',function(Request $request,$applicationId){
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url').
        "/operators/{$userId}/application-places/{$applicationId}",[]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::post('operator/application-places/{applicationId}',function(Request $request,$applicationId){
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ])->post(config('microservices.services.booking.base_url').
        "/operators/{$userId}/application-places/{$applicationId}",[
        'address_id' => $request->address_id,
        'isActive' => $request->isActive,
    ]);
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('services/{serviceId}/operators',function(Request $request,$serviceId){
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/services/{$serviceId}/operators",[]);
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('operator/application-items',function (Request $request){
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'X-USER-ID' => $userId
    ])->get(config('microservices.services.booking.base_url')."/operators/{$userId}/application-items",[]);
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('schedules/weekly/operators',function(Request $request){
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/schedules/weekly/operators/{$userId}",[]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::post('schedules/weekly/operators',function(Request $request){
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->post(config('microservices.services.booking.base_url')."/schedules/weekly/operators/{$userId}", $request->all());
    return response()->json(json_decode($response->body()),$response->status());
});


Route::post('schedules/exception/applications/{applicationId}',function(Request $request,$applicationId){
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->post(config('microservices.services.booking.base_url')."/schedules/exception/applications/{$applicationId}",
        [
            'place_id' => $request->place_id,
            'from' => $request->from,
            'to' => $request->to,
            'online' => $request->online,
            'onAnotherSite' => $request->onAnotherSite,
            'isAvailable' => $request->isAvailable
        ]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::get('schedules/exception/applications/{applicationId}',function(Request $request,$applicationId){
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/schedules/exception/applications/{$applicationId}",
        []);
    return response()->json(json_decode($response->body()),$response->status());
});



