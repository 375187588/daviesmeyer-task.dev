<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionControl
{

	/**
	* Handle an incoming request.
	* @param  \Illuminate\Http\Request  $request
	* @param  \Closure  $next
	* @return mixed Request || HTTP response
	*/
	public function handle($request, Closure $next)
	{
		$user = Auth::user();
		if (!$user)
		{
            request()->session()->flash('message', 'User not found!');

            return redirect()->route('index');
		}
		$roles = $this->getRequiredRoleForRoute($request->route());
		if (isset($user->role_id) && $user->hasRole($roles)){
			return $next($request);
		}
	}

	/**
	 * Method for getting roles for given route
	 * @param Request->route() $route
	 * @return array | null
	 */
	protected function getRequiredRoleForRoute($route)
	{
		$actions = $route->getAction();
		return isset($actions['roles']) ? $actions['roles'] : null;
	}
	
}