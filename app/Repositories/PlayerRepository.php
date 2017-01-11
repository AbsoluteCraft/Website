<?php

namespace App\Repositories;

use App\Models\Player\LastSeen;
use App\Models\Player\Player;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlayerRepository extends Repository {

	public function __construct() {
		parent::__construct(Player::class);
	}

	/**
	 * Find a player by Minecraft UUID
	 *
	 * @param $uuid
	 *
	 * @return Player
	 */
	public function getByUUID($uuid, $fail = false) {
		$player = Player::where('uuid', $uuid)
			->first();

		if($fail && $player == null) {
			$e = new ModelNotFoundException();
			$e->setModel(Player::class);

			throw $e;
		}


		return $player;
	}

	/**
	 * Find a player by username
	 *
	 * @param $username
	 *
	 * @return Player
	 */
	public function getByUsername($username, $fail = false) {
		$player = Player::where('username', $username)
			->first();

		if($fail && $player == null) {
			$e = new ModelNotFoundException();
			$e->setModel(Player::class);

			throw $e;
		}
	}

	/**
	 * Find a player from a User's UUID
	 *
	 * @param User $user
	 *
	 * @return Player
	 */
	public function getFromUser(User $user, $fail = false) {
		return $this->getByUUID($user->uuid, $fail);
	}

	public function getOrNew($uuid, $username) {
		$player = $this->getByUUID($uuid);

		if($player == null) {
			$player = new Player([
				'uuid' => $uuid,
				'username' => $username
			]);
		}

		return $player;
	}


	public function getOrCreate($uuid, $username) {
		$player = $this->getOrNew($uuid, $username);
		$player->save();

		return $player;
	}

	public function update($player, $fields) {
		$player = parent::update($player, $fields);

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

		return $player;
	}

}
