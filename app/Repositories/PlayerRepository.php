<?php

namespace App\Repositories;

use App\Player\Player;

class PlayerRepository {

	public function get($uuid) {
		return Player::where('uuid', $uuid)
			->first();
	}


	public function getOrCreate($uuid, $username) {
		$player = $this->get($uuid);

		if($player == null) {
			$player = new Player([
				'uuid' => $uuid,
				'username' => $username
			]);

			$player->save();
		}

		return $player;
	}

}