<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class ApiController extends BaseController {

	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	/**
	 * Wrap the API response so that we can control envelope/output
	 *
	 * @param     $data
	 * @param int $code
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function response($data, $code = 200) {
		return response()->json($data, $code);
	}

	/**
	 * Create a standard error response
	 *
	 * @param     $data
	 * @param int $code
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function error($data, $code = 500) {
		return response()->json($data, $code);
	}

}
