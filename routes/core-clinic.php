<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Lib\Http\Request as CustomRequest;

function custom_response($response){
    try {
        return response()->json(json_decode($response->body()),$response->status());
    }catch (\Exception $exception){
        return response()->json($response,503);
    }
}

Route::get('test',function(Request $request){
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.core_clinic.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.core_clinic.base_url')."/test",[]);
    return response()->json(json_decode($response->body()),$response->status());
});



Route::post('/login',function(Request $request){

    $headers = [ 'domain' => $request->header('domain') ?? 'guest'] ;
    $body = [
        'mobile' => $request->mobile,
        'password' => $request->password,
        'type' => $request->type
    ];

   $response = CustomRequest::post($headers,$body,'core_clinic','/login');
    return custom_response($response);
});

//Route::group(['middleware' => 'auth:user'],function (){
    Route::get('patients',function(Request $request){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],$request->all(),'core_clinic','/patients');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::post('patients',function(Request $request){
        $response = CustomRequest::post([
            'domain' => $request->header('domain') ?? 'guest'
        ],$request->all(),'core_clinic','/patients');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('patients/{id}',function(Request $request,$id){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic','/patients/'.$id);

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('user/{id}/patient',function(Request $request,$id){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/user/$id/patient");

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::post('user/{id}/patient',function(Request $request,$id){
        $response = CustomRequest::post([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/user/$id/patient");

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('user/{id}/operator',function(Request $request,$id){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/user/$id/operator");

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::post('user/{id}/operator',function(Request $request,$id){
        $response = CustomRequest::post([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/user/$id/operator");

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('user/{id}/personnel',function(Request $request,$id){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/user/$id/personnel");

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::post('user/{id}/personnel',function(Request $request,$id){
        $response = CustomRequest::post([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/user/$id/personnel");

        return response()->json(json_decode($response->body()),$response->status());
    });



    Route::get('appointments',function(Request $request){
        $response = CustomRequest::get([
            'domain' => auth('user')->user()->userCollection->domain
        ],$request->all(),'core_clinic','/appointments');
        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::patch('appointments/{id}/payment-status',function (Request $request,$id){
        $response = CustomRequest::patch([
            'domain' => auth('user')->user()->userCollection->domain
        ],[
            'payment_status' => $request->input('payment_status'),
        ],'core_clinic',"/appointments/$id/payment-status");
        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::patch('appointments/{id}/status',function (Request $request,$id){
        $response = CustomRequest::patch([
            'domain' => auth('user')->user()->userCollection->domain
        ],[
            'status' => $request->input('status'),
        ],'core_clinic',"/appointments/$id/status");
        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('operators',function(Request $request){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],$request->all(),'core_clinic','/operators');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::post('operators',function(Request $request){
        $response = CustomRequest::post([
            'domain' => $request->header('domain') ?? 'guest'
        ],$request->all(),'core_clinic','/operators');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('operators/{id}',function(Request $request,$id){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic','/operators/'.$id);

        return response()->json(json_decode($response->body()),$response->status());
    });


    Route::get('personnels',function(Request $request){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic','/personnels');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('personnels/{id}',function(Request $request,$id){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic','/personnels/'.$id);

        return response()->json(json_decode($response->body()),$response->status());
    });




