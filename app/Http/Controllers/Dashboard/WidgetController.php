<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\MulticraftRepository;

class WidgetController extends Controller {

	public function resources() {
		$multicraft = new MulticraftRepository();
		$resources = $multicraft->getGlobalServerResources();

		return response()->json($resources);
	}

}
