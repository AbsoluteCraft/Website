<?php

namespace App\Http\Controllers;

use App\Models\Player\Player;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller {

	public function get($username) {
		$player = Player::with('user', 'user.background', 'last_seen', 'economy.balance')
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
			'username' => 'required'
		]);

		$player = Player::where('username', $request->get('username'))
			->first();

		if($player) {
			return redirect()->route('player', ['username' => $player]);
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
			->orderBy('created_at', 'desc')
			->take(50)
			->get();

		$staff = User::staff()->get();

		$groupedStaff = [
			'operators' => [],
			'moderators' => [],
			'builders' => []
		];
		foreach($staff as $user) {
			$rank = $user->rank->name;

			$groupedStaff[$rank][] = $user;

			// Group together the sub ranks
			if(str_contains($rank, 'builder')) {
				$groupedStaff['builders'][] = $user;
			}
			if(str_contains($rank, 'moderator')) {
				$groupedStaff['moderators'][] = $user;
			}
		}

		return view('player.players', [
			'playerCount' => $playerCount,
			'players' => $players,
			'staff' => $groupedStaff
		]);
	}

}
