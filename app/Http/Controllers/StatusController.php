<?php

namespace App\Http\Controllers;

class StatusController extends Controller {

	public function get() {
		// TODO: Check online status of the server(s)

		return view('status.status');
	}

}