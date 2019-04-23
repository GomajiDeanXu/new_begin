<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class CommonLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $info = "-----------------------------------------------------------" .
        PHP_EOL . "#Api_Request" . PHP_EOL .
        "Url : " . $request->path() . PHP_EOL .
        "Inputs : " . PHP_EOL .
        json_encode($request, JSON_UNESCAPED_UNICODE) . PHP_EOL;

        Log::info($info);

        return $next($request);
    }
}
