<?php

namespace App\Repositories;

use App\Player\Player;

class LeaderboardRepository {

	public function getTokens($limit = 10) {
		return Player::orderBy('tokens', 'desc')
			->take($limit)
			->get();
	}

}
