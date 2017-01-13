<?php

namespace App\Http\ViewComposers;

use App\Models\Motd;
use App\Models\Shop\Donation;

class DonationSidebarComposer {

	public function create($view) {
		$donations = Donation::where('approved', 0)->count();
		$view->with('donations_count', $donations);

		$motds = Motd::count();
		$view->with('motds_count', $motds);
	}

}