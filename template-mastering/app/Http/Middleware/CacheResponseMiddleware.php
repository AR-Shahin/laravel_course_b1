<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheResponseMiddleware
{
    private $time;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $ttl = null)
    {
        $this->time = $ttl ?? now()->addDay();

        if (Cache::has($this->cacheKey($request))) {
            return response(Cache::get($this->cacheKey($request)));
        }


        return $next($request);
    }

    public function terminate($request, $response)
    {
        if (Cache::has($this->cacheKey($request))) {
            return;
        }
        Cache::put($this->cacheKey($request), $response->getContent(), $this->time);
    }


    private function cacheKey($request): string
    {
        return md5($request->fullUrl() . '-' . auth()->id());
    }
}
