<?php

namespace App\Http\Controllers\Api;

use App\Models\PlayersOnline;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServerPollController extends ApiController {

	public function poll(Request $request) {
		$this->validate($request, [
			'count' => 'required'
		]);

		PlayersOnline::create([
			'online' => $request->get('count'),
			'date' => Carbon::now()->toDateString(),
			'timestamp' => Carbon::now()
		]);

		return $this->response([]);
	}

}
