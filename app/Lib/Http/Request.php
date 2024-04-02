<?php

namespace App\Lib\Http;

use Illuminate\Support\Facades\Http;
use Log;

class Request
{
    public function __construct()
    {

    }

    public static function post($request_headers, $request_body, $service, $route)
    {
        try {
            $headers = [
                'api_key' => config("microservices.services.$service.api_key"),
                'Accept' => 'application/json',
                'authorization' => request()->header('authorization'),
            ];
            $response = Http::withHeaders(array_merge($headers, $request_headers))
                ->post(config("microservices.services.$service.base_url") . $route, $request_body);
            if ($response->status() == 500) {
                Log::debug($service . " : " . $response->body());
            }

            return $response;

        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            $error = [
                'message' => 'gateway server error :' . $th->getMessage()
            ];
            return response()->json(['error' => $error], 500);
        }

    }

    public static function delete($request_headers, $request_body, $service, $route)
    {
        try {
            $headers = [
                'api_key' => config("microservices.services.$service.api_key"),
                'Accept' => 'application/json',
                'authorization' => request()->header('authorization'),
            ];
            $response = Http::withHeaders(array_merge($headers, $request_headers))
                ->delete(config("microservices.services.$service.base_url") . $route, $request_body);
            if ($response->status() == 500) {
                Log::debug($service . " : " . $response->body());
            }

            return $response;

        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            $error = [
                'message' => 'gateway server error :' . $th->getMessage()
            ];
            return response()->json(['error' => $error], 500);
        }

    }

    public static function put($request_headers, $request_body, $service, $route)
    {
        try {
            $headers = [
                'api_key' => config("microservices.services.$service.api_key"),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => request()->header('Authorization'),
            ];
            $response = Http::withHeaders(array_merge($headers, $request_headers))
                ->put(config("microservices.services.$service.base_url") . $route, $request_body);
            if ($response->status() == 500) {
                Log::debug($service . " : " . $response->body());
            }

            return $response;

        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            $error = [
                'message' => 'gateway server error :' . $th->getMessage()
            ];
            return response()->json(['error' => $error], 500);
        }

    }

    public static function patch($request_headers, $request_body, $service, $route)
    {
        try {
            $headers = [
                'api_key' => config("microservices.services.$service.api_key"),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => request()->header('Authorization'),
            ];
            $response = Http::withHeaders(array_merge($headers, $request_headers))
                ->patch(config("microservices.services.$service.base_url") . $route, $request_body);
            if ($response->status() == 500) {
                Log::debug($service . " : " . $response->body());
            }

            return $response;

        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            $error = [
                'message' => 'gateway server error :' . $th->getMessage()
            ];
            return response()->json(['error' => $error], 500);
        }

    }

    public static function get($request_headers, $request_body, $service, $route)
    {
        try {
            $headers = [
                'api_key' => config("microservices.services.$service.api_key"),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => request()->header('Authorization'),
            ];
            $response = Http::withHeaders(array_merge($headers, $request_headers))
                ->get(config("microservices.services.$service.base_url") . $route, $request_body);

            if ($response->status() == 500) {
                Log::debug($service . " : " . $response->body());
            }

            return $response;
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            $error = [
                'message' => 'gateway server error :' . $th->getMessage()
            ];
            return response()->json(['error' => $error], 500);
        }
    }

}
