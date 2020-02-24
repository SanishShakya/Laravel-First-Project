<?php

namespace App\Http\Middleware;

use Closure;

class Permission
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
        $role = auth()->user()->role()->get();
        if(count($role) == 1){
            $current_page_route = $request->route()->getName();
            if($role[0]->permissions()->where('route', '=', $current_page_route)->count()==0){
                abort(404, 'permission not assigned');
            }
        }else{
            abort(404, 'role not assigned');
        }
        return $next($request);
    }
}
