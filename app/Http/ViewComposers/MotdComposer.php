<?php

namespace App\Http\ViewComposers;

use App\Motd;

class MotdComposer {

	public function create($view) {
		$motd = Motd::first();

		$view->with('motd', $motd);
	}

}