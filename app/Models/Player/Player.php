<?php

namespace App\Models\Player;

use App\Models\Economy\Account;
use App\Libs\DynmapGrid;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Player extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'uuid', 'username', 'tokens'
	];

	public function user() {
		return $this->belongsTo(User::class, 'uuid', 'uuid');
	}

	public function last_seen() {
		return $this->hasOne(LastSeen::class);
	}

	public function economy() {
		return $this->belongsTo(Account::class, 'uuid', 'uuid');
	}

	public function gameconfig() {
		return $this->hasMany(GameConfig::class);
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
			return (object) $ranks[1];
		}
	}

	public function getBackgroundAttribute() {
		if($this->user) {
			return $this->user->background;
		} else {
			return Background::find(1);
		}
	}


	public function getBalanceAttribute() {
		if($this->economy) {
			return number_format($this->economy->balance->balance, 2);
		}

		return 0;
	}

	public function getDynmapAttribute() {
		// Default params
		$params = [
			'mapname' => 'surface',
			'zoom' => 4,
			'y' => 65,

			'worldname' => 'Creative',
			'x' => -48,
			'z' => 435
		];

		if($this->last_seen != null) {
			$params['worldname'] = $this->last_seen->world;
			$params['x'] = $this->last_seen->x;
			$params['z'] = $this->last_seen->z;
		}

		$grid = new DynmapGrid();
		$params['url'] = $grid->url . '?' . http_build_query($params);
		$params['grid'] = $grid->buildGrid($params['x'], $params['z']);

		if($this->last_seen == null) {
			$params['worldname'] = null;
		}

		return (object) $params;
	}

	public function getDynmapGridAttribute() {
		// Default params
		$params = [
			'mapname' => 'flat',
			'zoom' => 4,
			'y' => 65,

			'worldname' => 'Creative',
			'x' => -48,
			'z' => 435
		];

		$grid = new DynmapGrid();
		$images = $grid->generate($params['x'], $params['z'], $params['worldname'], $params['mapname']);

		return implode('', $images);
	}

}
