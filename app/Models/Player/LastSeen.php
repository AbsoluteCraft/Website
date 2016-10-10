<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class LastSeen extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	public $table = 'player_lastseen';

	public $timestamps = false;

}
