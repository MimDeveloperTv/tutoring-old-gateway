<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Lib\Http\Request as CustomRequest;

/* -------------------- Auth  ---------------- */

Route::group(['middleware' => []], function () {

    Route::get('reserves', function (Request $request) {
        $response = CustomRequest::get([
            'domain' => $request->header('domain')
        ], $request->all(), 'core_clinic', '/reserves');
        return response()->json(json_decode($response->body()), $response->status());
    });

    Route::patch('reserves/{id}/payment-status', function (Request $request, $id) {
        $response = CustomRequest::patch([
            'domain' => $request->header('domain')
        ], [
            'payment_status' => $request->input('payment_status'),
        ], 'core_clinic', "/reserves/$id/payment-status");
        return response()->json(json_decode($response->body()), $response->status());
    });

    Route::patch('reserves/{id}/status', function (Request $request, $id) {
        $response = CustomRequest::patch([
            'domain' => $request->header('domain')
        ], [
            'status' => $request->input('status'),
        ], 'core_clinic', "/reserves/$id/status");
        return response()->json(json_decode($response->body()), $response->status());
    });

    Route::post('operators', function (Request $request) {
        $response = CustomRequest::post([
            'domain' => $request->header('domain') ?? 'guest'
        ], $request->all(), 'core_clinic', '/operators');

        return response()->json(json_decode($response->body()), $response->status());
    });


    Route::get('personnels', function (Request $request) {
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ], [], 'core_clinic', '/personnels');

        return response()->json(json_decode($response->body()), $response->status());
    });

    Route::get('personnels/{id}', function (Request $request, $id) {
        $response = CustomRequest::get([
            'domain' => $request->header('domain') ?? 'guest'
        ], [], 'core_clinic', '/personnels/' . $id);

        return response()->json(json_decode($response->body()), $response->status());
    });

});

Route::get('reserves/{id}',function (Request $request,$id){

    $response =  CustomRequest::get([ 'domain' => $request->header('domain') ?? 'guest'], [],
        'core_clinic', "/reserves/{$id}?XDEBUG_SESSION=true");

    return response()->json(json_decode($response->body()), $response->status());
});

Route::post('reserves',function (Request $request){
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response =  CustomRequest::post([
        'domain' => $request->header('domain') ?? 'guest',
        'X-USER-ID' => $userId
    ], $request->all(),
        'core_clinic', "/reserves?XDEBUG_SESSION=true");

    return response()->json(json_decode($response->body()),$response->status());
});


Route::post('/reserves/slots',function (Request $request){
    $userId ='716caa6e-e4fc-4244-b5b0-f84768b2fbe6';
    $response =  CustomRequest::post([
        'domain' => $request->header('domain') ?? 'guest',
        'X-USER-ID' => $userId
    ], [
        'place_id' => $request->place_id,
        'to_date' => $request->to_date,
    ],
        'core_clinic', "/reserves/slots?XDEBUG_SESSION=true");

    return response()->json(json_decode($response->body()),$response->status());
});


function custom_response($response): \Illuminate\Http\JsonResponse
{
    try {
        return response()->json(json_decode($response->body()), $response->status());
    } catch (\Exception $exception) {
        return response()->json($response, 503);
    }
}


