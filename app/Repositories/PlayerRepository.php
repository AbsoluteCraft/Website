<?php

namespace App\Repositories;

use App\Models\Player\LastSeen;
use App\Models\Player\Player;

class PlayerRepository {

	/**
	 * Find a player by Minecraft UUID
	 *
	 * @param $uuid
	 *
	 * @return Player
	 */
	public function getByUUID($uuid) {
		return Player::where('uuid', $uuid)
			->first();
	}

	public function getByUsername($username) {
		return Player::where('username', $username)
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

	public function update(Player $player, $fields) {
		foreach($player->getFillable() as $field) {
			if(isset($fields[$field])) {
				$player->{$field} = $fields[$field];
			}
		}

		if(isset($fields['last_seen'], $fields['last_seen_world'])) {
			if($player->last_seen) {
				$last_seen = $player->last_seen;
			} else {
				$last_seen = new LastSeen();
			}

			$last_seen->left_at = $fields['last_seen'];
			$last_seen->world = $fields['last_seen_world'];

			$last_seen->save();
		}

		if($player->isDirty()) {
			$player->save();
		}

		return $player;
	}

}
