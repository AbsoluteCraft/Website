<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

class Api {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		if($request->hasHeader('Authorization') == false) {
			return response()->json([
				'error' => 'Bad request.'
			], 400);
		}

		if(Hash::check($request->header('Authorization'), env('API_KEY')) == false) {
			return response()->json([
				'error' => 'Forbidden.'
			], 403);
		}

		return $next($request);
	}

}
