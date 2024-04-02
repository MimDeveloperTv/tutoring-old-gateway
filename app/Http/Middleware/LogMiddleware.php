<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        
            // $_ENV['APP_NAME'] = 'cloud';
            // $_ENV['APP_NAMA'] = 'cloud2';
            // $env = '';
            // foreach ($_ENV as $key => $value) {
            //     $env .= $key."=".$value.PHP_EOL;
            // }
            // $myfile = fopen("../.env", "w") or die("Unable to open file!");
            // fwrite($myfile, $env);
            // fclose($myfile);
        
        return $next($request);
    }
}
