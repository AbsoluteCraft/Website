<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class AnnouncementController extends Controller {

	public function get() {
		$announcements = Announcement::get();

		return view('dashboard.announcements', [
			'announcements' => $announcements
		]);
	}

}