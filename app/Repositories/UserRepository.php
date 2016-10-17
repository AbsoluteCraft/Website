<?php

namespace App\Repositories;

use App\Models\Player\Player;
use App\Models\User;

class UserRepository {

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

	public function update(User $user, $fields) {
		foreach($user->getFillable() as $field) {
			if(isset($fields[$field])) {
				$user->{$field} = $fields[$field];
			}
		}

		if(isset($fields['bio'])) {
			$user->bio = trim($fields['bio']);
		}

		if($user->isDirty()) {
			$user->save();
		}

		return $user;
	}

}