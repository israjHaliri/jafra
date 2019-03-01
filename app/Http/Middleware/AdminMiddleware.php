<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;

class AdminMiddleware
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
        $id = Auth::user()->id;
        $data = \App\User::where('id','!=', $id)->where('active', 0)->orderBy('id');
        $list_notif = $data->take(3)->get();
        View::share('count', $data->count());
        View::share('list_notif', $list_notif);
        if ($request->user()->level != 1)
        {
            return redirect()->guest('login');
        }
        return $next($request);
    }
}
