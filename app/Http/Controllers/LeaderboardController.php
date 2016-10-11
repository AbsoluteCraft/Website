<?php

namespace App\Http\Controllers;

use App\Models\Game\Game;
use App\Models\Player\PlayerGame;

class LeaderboardController extends Controller {

	public function get() {
		$games = Game::all();

		foreach($games as $game) {
			$game->leaderboard = PlayerGame::with('player')
				->where('game_id', $game->id)
				->orderBy('points', 'desc')
				->take(10)
				->get();
		}

		return view('leaderboards.leaderboards', [
			'games' => $games
		]);
	}

}