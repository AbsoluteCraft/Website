<?php

namespace App\Models\Player;

use App\Models\Game\Game;
use Illuminate\Database\Eloquent\Model;

class PlayerGame extends Model {

	public $table = 'player_games';

	public $fillable = [
		'player_id', 'game_id', 'points', 'config'
	];

	public function player() {
		return $this->belongsTo(Player::class);
	}

	public function game() {
		return $this->belongsTo(Game::class);
	}

}