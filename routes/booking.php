<?php

use App\Models\User;
use App\Models\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Lib\Http\Request as CustomRequest;


/* -------------------- */
Route::get('all-services',function(Request $request){
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/services",$request->all());
    return response()->json(json_decode($response->body()),$response->status());
});

/* -------------------- */



Route::get('collection/services',function(Request $request){
//    $user_colelction_id = auth('user')->user()->user_collection_id;
    $user_colelction_id = '84b15c1f-7f0e-411e-9a0c-d5626653b751';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/collection/$user_colelction_id/services",[]);
    return response()->json(json_decode($response->body()),$response->status());
});
// })->middleware('auth:user');

Route::post('collection/services',function(Request $request){
    //  $user_colelction_id = auth('user')->user()->user_collection_id;
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
//})->middleware('auth:user');


Route::get('collection/addresses',function(Request $request){
//    $user_collection_id = auth('user')->user()->user_collection_id;
    $user_collection_id = '84b15c1f-7f0e-411e-9a0c-d5626653b751';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/collection/{$user_collection_id}/addresses",[]);
    return response()->json(json_decode($response->body()),$response->status());
});
//})->middleware('auth:user');

Route::get('collection/appointable-items',function(Request $request){
    $user_collection_id  = "84b15c1f-7f0e-411e-9a0c-d5626653b751";
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/collection/$user_collection_id/appointable-items",$request->all());
    return response()->json(json_decode($response->body()),$response->status());
});
//})->middleware('auth:user');

Route::post('collection/addresses',function(Request $request){
//    $user_collection_id = auth('user')->user()->user_collection_id;
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
//})->middleware('auth:user');

Route::post('operator/addresses',function(Request $request){
//    $user_id = auth('user')->user()->id;
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
//})->middleware('auth:user');

Route::get('operator/addresses',function(Request $request){
//    $user_id = auth('user')->user()->id;
    $user_id ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/operators/{$user_id}/addresses",[]);
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('operator/applications',function(Request $request){
    //    $user_id = auth('user')->user()->id;
    $user_id ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/operators/{$user_id}/applications",[]);
    return response()->json(json_decode($response->body()),$response->status());
});
//})->middleware('auth:user');

Route::post('operator/applications',function(Request $request){
    //    $user_id = auth('user')->user()->id;
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
//})->middleware('auth:user');

Route::get('operator/application-places/{applicationId}',function(Request $request,$applicationId){
    //    $userId = auth('user')->user()->id;
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url').
        "/operators/{$userId}/application-places/{$applicationId}",[]);
    return response()->json(json_decode($response->body()),$response->status());
});
//})->middleware('auth:user');

Route::post('operator/application-places/{applicationId}',function(Request $request,$applicationId){
    //    $userId = auth('user')->user()->id;
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
//})->middleware('auth:user');


Route::post('reserves',function (Request $request){

    //    $userId = auth('user')->user()->id;
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';

    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
         'X-USER-ID' => $userId
    ])->post(config('microservices.services.booking.base_url')."/reserves?XDEBUG_SESSION=true",$request->all());
    return response()->json(json_decode($response->body()),$response->status());
});
//})->middleware('auth:user');

//Route::get('service-operators',function(Request $request){
Route::get('services/{serviceId}/operators',function(Request $request,$serviceId){
    //  $user_collection_id = auth('user')->user()->user_collection_id;
    // $user_collection_id = '84b15c1f-7f0e-411e-9a0c-d5626653b751';
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/services/{$serviceId}/operators",[
//    ])->get(config('microservices.services.booking.base_url')."/service-operators",[
        //  'service_id' =>$request->service_id,
        // 'item_id' => $request->item_id,
        // 'user_collection_id' => $user_collection_id
    ]);
    return response()->json(json_decode($response->body()),$response->status());
//})->middleware('auth:user');
});





/* ---------------------------- Not - Refactored ------------------------------------ */

/* ---------------------------- todo: Moved To Core Service ------------------------------------ */
Route::get('appointments/{id}',function (Request $request,$id){
    $user_collection_id = auth('user')->user()->user_collection_id;
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/appointments/$id",[
        'user_collection_id' => $user_collection_id,
    ]);
    return response()->json(json_decode($response->body()),$response->status());
});
/* ---------------------------- todo: Moved To Core Service ------------------------------------ */



Route::get('/service-application-place/slots',function(Request $request){
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/service-application-place/slots",$request->all());
    return response()->json(json_decode($response->body()),$response->status());
});


Route::get('service-requests',function (Request $request){
    $user_collection_id = auth('user')->user()->user_collection_id;
    $response = Http::withHeaders([
        'api_key' => config('microservices.services.booking.api_key'),
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/service-requests",[
        'user_collection_id' => $user_collection_id,
        'flag' => $request->flag,
        'consumer_id' => $request->consumer_id
    ]);
    return response()->json(json_decode($response->body()),$response->status());
});

Route::post('service-requests',function (Request $request){
    $response = CustomRequest::post([],[
        'service_model_item_id' => $request->service_model_item_id,
        'consumer_id' => $request->consumer_id
    ],'booking','/service-requests');
    return response()->json(json_decode($response->body()),$response->status());
});

Route::get('operator-service-model-items',function (Request $request){
    $response = CustomRequest::get([],[
        'operator_id' => $request->operator_id,
    ],'booking','/operator-service-model-items');
    return response()->json(json_decode($response->body()),$response->status());
});


 Route::get('weekly-schedules',function(Request $request){
    $response = Http::withHeaders([
     'api_key' => config('microservices.services.booking.api_key'),
     'Accept' => 'application/json',
     'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/weekly-schedules",[
        'operator_id' =>$request->operator_id,
    ]);
    return response()->json(json_decode($response->body()),$response->status());
 })->middleware('auth:user');

 Route::post('weekly-schedules',function(Request $request){
    $response = Http::withHeaders([
     'api_key' => config('microservices.services.booking.api_key'),
     'Accept' => 'application/json',
     'Content-Type' => 'application/json'
    ])->post(config('microservices.services.booking.base_url')."/weekly-schedules",$request->all());
    return response()->json(json_decode($response->body()),$response->status());
 })->middleware('auth:user');

 Route::post('exception-schedules',function(Request $request){
    $response = Http::withHeaders([
     'api_key' => config('microservices.services.booking.api_key'),
     'Accept' => 'application/json',
     'Content-Type' => 'application/json'
    ])->post(config('microservices.services.booking.base_url')."/exception-schedules",[
        'service_application_id' => $request->service_application_id,
        'place_id' => $request->place_id,
        'from' => $request->from,
        'to' => $request->to,
        'online' => $request->online,
        'onAnotherSite' => $request->onAnotherSite,
        'isAvailable' => $request->isAvailable
    ]);
    return response()->json(json_decode($response->body()),$response->status());
 })->middleware('auth:user');

 Route::get('exception-schedules',function(Request $request){
    $response = Http::withHeaders([
     'api_key' => config('microservices.services.booking.api_key'),
     'Accept' => 'application/json',
     'Content-Type' => 'application/json'
    ])->get(config('microservices.services.booking.base_url')."/exception-schedules",[
        'service_application_id' =>$request->service_application_id,
    ]);
    return response()->json(json_decode($response->body()),$response->status());
 })->middleware('auth:user');







