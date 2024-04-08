<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Lib\Http\Request as CustomRequest;


//Route::group(['middleware' => 'auth:user'], function () {
Route::group(['middleware' => []], function () {

//    Route::get('appointments', function (Request $request) {
//        $response = CustomRequest::get([
//            'domain' => $request->header('domain')
//        ], $request->all(), 'core_clinic', '/appointments');
//        return response()->json(json_decode($response->body()), $response->status());
//    });

//    Route::patch('appointments/{id}/payment-status', function (Request $request, $id) {
//        $response = CustomRequest::patch([
//            'domain' => $request->header('domain')
//        ], [
//            'payment_status' => $request->input('payment_status'),
//        ], 'core_clinic', "/appointments/$id/payment-status");
//        return response()->json(json_decode($response->body()), $response->status());
//    });

//    Route::patch('appointments/{id}/status', function (Request $request, $id) {
//        $response = CustomRequest::patch([
//            'domain' => $request->header('domain')
//        ], [
//            'status' => $request->input('status'),
//        ], 'core_clinic', "/appointments/$id/status");
//        return response()->json(json_decode($response->body()), $response->status());
//    });

//    Route::post('operators', function (Request $request) {
//        $response = CustomRequest::post([
//            'domain' => $request->header('domain') ?? 'guest'
//        ], $request->all(), 'core_clinic', '/operators');
//
//        return response()->json(json_decode($response->body()), $response->status());
//    });


//    Route::get('personnels', function (Request $request) {
//        $response = CustomRequest::get([
//            'domain' => $request->header('domain') ?? 'guest'
//        ], [], 'core_clinic', '/personnels');
//
//        return response()->json(json_decode($response->body()), $response->status());
//    });

//    Route::get('personnels/{id}', function (Request $request, $id) {
//        $response = CustomRequest::get([
//            'domain' => $request->header('domain') ?? 'guest'
//        ], [], 'core_clinic', '/personnels/' . $id);
//
//        return response()->json(json_decode($response->body()), $response->status());
//    });

});

function custom_response($response): \Illuminate\Http\JsonResponse
{
    try {
        return response()->json(json_decode($response->body()), $response->status());
    } catch (\Exception $exception) {
        return response()->json($response, 503);
    }
}


