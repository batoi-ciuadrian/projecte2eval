<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) {
//        if (!$request->user()->hasRole($role)) {
//            return redirect()->action('CatalogController@getIndex');
//        }
//        return $next($request);
        foreach (explode(':', $role) as $rol) {
            if ($request->user()->hasRole($rol)) {
                return $next($request);
            }
        }
        abort(403, 'No tienes autorización para ingresar.');
    }

}
