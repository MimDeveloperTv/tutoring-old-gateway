<?php

namespace App\Http\Controllers;

use App\Models\Permition;
use Illuminate\Http\Request;

class PermitionController extends Controller
{
    public function sync()
    {
        $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();
        // foreach ($routeCollection as $value)
        dd($routeCollection->getRoutesByMethod());
    }

    public function index()
    {
        $permitions = Permition::all();
 return response()->json(['permitions' => $permitions],200);
    }
}
