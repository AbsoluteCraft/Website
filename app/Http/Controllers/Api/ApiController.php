<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class ApiController extends BaseController {

	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	protected function response($data) {
		return response()->json($data);
	}

	protected function error($data, $code = 500) {
		return response()->json($data, $code);
	}

}
