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


    Route::get('medical-history/{id}', function(Request $request, $id){
        // dd($id);
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/medical-history/$id");

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::patch('medical-history/{id}', function(Request $request, $id){
        // dd($request->all());
        $response = CustomRequest::patch([
            'domain' => $request->header('domain') ?? 'guest'
        ],$request->all(),'core_clinic',"/medical-history/$id");

        return response()->json(json_decode($response->body()),$response->status());
    });


    Route::delete('medical-history/{id}', function(Request $request, $id){
        // dd($request->all());
        $response = CustomRequest::delete([
            'domain' => $request->header('domain') ?? 'guest'
        ],[],'core_clinic',"/medical-history/$id");

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

    Route::get('planning-errors',function (Request $request){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],$request->all(),'core_clinic','/planning-errors');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('surgery-form-data',function (Request $request){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],$request->all(),'core_clinic','/surgery-form-data');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('diagnosis-data',function (Request $request){
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ],[
            'patient_id' => $request->input('patient_id')
        ],'core_clinic','/diagnosis-data');

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('medical-forms',function (Request $request){
        $response = CustomRequest::get([
            'domain' => auth('user')->user()->userCollection->domain
        ],$request->all(),'core_clinic','/medical-forms');
        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::get('medical-forms/{id}',function (Request $request,$id){
        $response = CustomRequest::get([
            'domain' => auth('user')->user()->userCollection->domain
        ],$request->all(),'core_clinic','/medical-forms/'.$id);

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::put('medical-forms/{id}',function (Request $request,$id){
        $response = CustomRequest::put([
            'domain' => auth('user')->user()->userCollection->domain
        ],$request->all(),'core_clinic','/medical-forms/'.$id);

        return response()->json(json_decode($response->body()),$response->status());
    });

    Route::patch('medical-forms/{id}',function (Request $request,$id){
        $response = CustomRequest::patch([
            'domain' => auth('user')->user()->userCollection->domain
        ],$request->all(),'core_clinic','/medical-forms/'.$id);

        return response()->json(json_decode($response->body()),$response->status());
    });
//});


 Route::post('upload-medicine-files',function (Request $request){
     try {
         $response = \Illuminate\Support\Facades\Http::attach('file',file_get_contents($request->file('file')),$request->file('file')->getClientOriginalName())->withHeaders([
             'domain' => auth('user_collection')->user()->domain,
         ])->post(config('microservices.services.core_clinic.base_url').'/upload-medicine-files',$request->all());
         return response()->json(json_decode($response->body()),$response->status());
     }catch (\Exception $exception)
     {
         return response()->json($exception->getMessage(),459);
     }
 });

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

// Route::post('/login', function(Request $request) {
//    $response = Http::withHeaders([
//     'api_key' => config('microservices.services.core_clinic.api_key'),
//     'Accept' => 'application/json',
//     'Content-Type' => 'application/json'
//  ])->post(config('microservices.services.core_clinic.base_url')."/login",[
//       'mobile' => $request->mobile,
//       'password' => $request->password,
//       'type' => $request->type
//    ]);
//    return response()->json(json_decode($response->body()),$response->status());
// });





