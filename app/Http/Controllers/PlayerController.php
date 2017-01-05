<?php

namespace App\Http\Controllers;

use App\Models\Player\Player;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller {

	public function get($username) {
		$player = Player::with('user', 'user.background', 'last_seen', 'economy.balance', 'games', 'games.game')
			->where('username', $username)
			->first();

		if($player == null) {
			return redirect()->route('players')
				->with('flashMessage', [
					'message' => 'Player not found',
					'type' => 'danger'
				]);
		}

		return view('player.player', [
			'player' => $player
		]);
	}

	public function search(Request $request) {
		$this->validate($request, [
			'username' => 'required|max:16'
		]);

		$player = Player::where('username', $request->get('username'))
			->first();

		if($player) {
			return redirect()->route('player', ['username' => $player->username]);
		}

		return redirect()->route('players')
			->with('flashMessage', [
				'message' => 'Player not found',
				'type' => 'danger'
			]);
	}

	public function getAll() {
		$playerCount = Player::count();

		$players = Player::notStaff()
			->select('players.*')
			->orderBy('id', 'desc') // players table doesn't have timestamps
			->take(50)
			->get();

		$staff = User::staff()->get();

		$groupedStaff = [
			'operator' => [],
			'moderator' => [],
			'builder' => []
		];
		foreach($staff as $user) {
			$rank = $user->rank->name;

			// Group together the sub ranks
			if(str_contains($rank, 'builder')) {
				$groupedStaff['builder'][] = $user;
			} else if(str_contains($rank, 'moderator')) {
				$groupedStaff['moderator'][] = $user;
			} else {
				$groupedStaff[$rank][] = $user;
			}
		}

		return view('player.players', [
			'playerCount' => $playerCount,
			'players' => $players,
			'staff' => $groupedStaff
		]);
	}

}
