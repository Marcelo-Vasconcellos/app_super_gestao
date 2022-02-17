<?php

namespace App\Http\Middleware;
use App\LogAcesso;

use Closure;

class LogAcessoMiddleware
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
        //tratamento do $request
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a ROUTE $route"]);
        //return Response('chegou no middleware e teerminiado no próprio');
        return $next($request); // devolve um RESPONSE para o próximo passo

    }
}
