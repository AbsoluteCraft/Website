<?php

namespace App\Http\Controllers\Api;

class HomeController extends ApiController {

	public function get() {
		return $this->response([
			'announcements' => '/announcements',
			'leaderboard.tokens' => '/leaderboard/tokens',
			'player' => '/player',
			'player.join' => '/player/join',
			'player.leave' => '/player/leave'
		]);
	}

}
