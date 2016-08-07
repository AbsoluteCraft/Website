<?php

namespace App\Player;

use App\Libs\DynmapGrid;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Player extends Model {

	public function user() {
		return $this->belongsTo(User::class, 'uuid', 'uuid');
	}

	public function scopeNotStaff($query) {
		$ranks = config('ranks');
		$minStaffRank = 10;

		foreach($ranks as $num => $rank) {
			if($rank['staff'] == true) {
				$minStaffRank = $num;
			}
		}

		return $query->leftJoin('users', 'users.uuid', '=', 'players.uuid')
			->where(function($query) use($minStaffRank) {
				$query->whereNull('users.id')
					->orWhere('users.rank', '<', $minStaffRank);
			});
	}

	public function getRankAttribute() {
		if($this->user) {
			return $this->user->rank;
		} else {
			$ranks = config('ranks');
			return $ranks[1];
		}
	}

	public function getBackgroundAttribute() {
		$background = null;

		if($this->user) {
			$background = Background::find($this->user->profile_background_id);
		} else {
			$background =  Background::find(1);
		}

		return $background->url;
	}

	public function getDynmapGridAttribute() {
		// Default params
		$params = [
			'map' => 'flat',
			'zoom' => 4,
			'y' => 65,

			'world' => 'Creative',
			'x' => -48,
			'z' => 435
		];

		$grid = new DynmapGrid();
		$images = $grid->generate($params['x'], $params['z'], $params['world'], $params['map']);

		return implode('', $images);
	}

	public function getDynmapUrlAttribute() {
		// Default params
		$params = [
			'mapname' => 'surface',
			'zoom' => 4,
			'y' => 65,

			'worldname' => 'Creative',
			'x' => -48,
			'z' => 435
		];

		$grid = new DynmapGrid();
		return $grid->url . '?' . http_build_query($params);
	}

}