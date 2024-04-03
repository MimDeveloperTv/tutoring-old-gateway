<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// todo: read Task Documents in Google Sheet And Implement This

Route::post('/roles', function (Request $request) {
    $response = Http::withHeaders(['api_key' => config('microservices.services.permission.api_key')])
        ->post(config('microservices.services.permission.base_url') . "/roles",
            [
                'owner_id' => auth('user')->user()->user_collection_id,
                'user_id' => auth('user')->user()->id,
                'name' => $request->name,
            ]);
    return response()->json(json_decode($response->body()), $response->status());
})->middleware(['auth:user', 'permission:admin']);
