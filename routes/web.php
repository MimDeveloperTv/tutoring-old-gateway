<?php

use App\Http\Controllers\PermitionController;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PermitionController::class,'sync']);

Route::resource('perm',PermitionController::class);

Route::any('/{any}', function(Request $request,$path) {
   $response = Http::get('http://172.16.238.2/'.$path);
   return new Response($path, $response->status());
})->middleware('router');




