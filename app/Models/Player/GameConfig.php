<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class GameConfig extends Model {

	public $table = 'player_game_config';

	public $fillable = [
		'player_id', 'game_id', 'config'
	];

}