<?php

namespace App\Repositories;

use App\Models\Player\Player;

class LeaderboardRepository {

	public function getTokens($limit = 10) {
		return Player::orderBy('tokens', 'desc')
			->orderBy('username', 'asc')
			->take($limit)
			->get();
	}

}
