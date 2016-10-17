<?php

namespace App\Http\ViewComposers;

use App\Models\Shop\Donation;

class DonationSidebarComposer {

	public function create($view) {
		$donations = Donation::count();

		$view->with('donations_count', $donations);
	}

}