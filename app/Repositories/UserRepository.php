<?php

namespace App\Repositories;

use App\Models\Player\Player;
use App\Models\User;

class UserRepository extends Repository {

	public function __construct() {
		parent::__construct(User::class);
	}

	/**
	 * Find a player from a User (using UUID)
	 *
	 * @param User             $user
	 * @param PlayerRepository $playerRepository
	 *
	 * @return Player
	 */
	public function getPlayer(User $user, PlayerRepository $playerRepository) {
		return $playerRepository->getByUUID($user->uuid);
	}

	public function update($user, $fields) {
		$user = parent::update($user, $fields);

		if(isset($fields['bio'])) {
			$user->bio = trim($fields['bio']);
		}

		return $user;
	}

}