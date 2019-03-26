<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        $params = $request->all();
//        dd($params);
        if(isset($params['age'])&&$params['age']<18){
            echo '您还没有成年';exit;
        }
        return $next($request);
    }

}
