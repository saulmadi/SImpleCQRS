<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class ReturnEmptyJson
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
        $response = $next($request);
        if($request->expectsJson())
            return $this->defaultResonse($response);
        return $response;
    }

    protected function defaultResonse(Response $response)
    {
        $content = $response->getContent();

        if(!$content)
        {
            return response()->json(['success' => true]);
        }
        return $response;
    }
}
