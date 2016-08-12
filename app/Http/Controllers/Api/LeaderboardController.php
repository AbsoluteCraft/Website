<?php

namespace App\Http\Controllers\Api;

use App\Repositories\LeaderboardRepository;

class LeaderboardController extends ApiController {

	private $repo;

	public function __construct(LeaderboardRepository $leaderboardRepository) {
		$this->repo = $leaderboardRepository;
	}

	public function getTokens() {
		return $this->response($this->repo->getTokens());
	}

}
