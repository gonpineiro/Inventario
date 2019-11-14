<?php

namespace App\Http\Middleware;

use Closure;
use App\Host;

class VerifyHostTypeId
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
        $host_type_id = Host::where('id',$request->id)->firstOrFail()->host_type->id;
        //if ($host_type_id == 1)  {return redirect('/edit_computadora/'.$request->id); }
        $disp= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        //dd($url);
        dd(substr($url, 0));

        return $next($request);


    }
}
