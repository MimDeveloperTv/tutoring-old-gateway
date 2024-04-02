<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use App\Jobs\AuthorizeAccessJob;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('set',function(Request $request){
   AuthorizeAccessJob::dispatch(1,"Appointments", 5);
    Redis::set('name',$request->name);
    dd(env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'));
});
Route::get('get',function(){
    dd(Redis::get('name'));
});

Route::get('/service1', function(Request $request) {
    $response = \Illuminate\Support\Facades\Http::get('http://microservice-a/api/service');
    return new \Illuminate\Http\Response($response->body(), $response->status());
 });

 Route::get('/service2', function(Request $request) {
    $bearer = $request->bearerToken();
    $response = \Illuminate\Support\Facades\Http::withToken($bearer)->get('http://microservice-b/api/service');
    return new \Illuminate\Http\Response($response->body(), $response->status());
 });

 Route::get('/service3', function(Request $request) {
    $bearer = $request->bearerToken();
    $response = \Illuminate\Support\Facades\Http::withToken($bearer)->get('http://microservice-c/api/service');
    return new \Illuminate\Http\Response($response->body(), $response->status());
 });




