<?php

namespace App\Models;

use App\Models\Player\Background;
use Golonka\BBCode\BBCodeParser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'dob', 'uuid', 'location', 'dob',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function background() {
		return $this->belongsTo(Background::class, 'profile_background_id');
	}

	/**
	 * Check the User's rank number is within staff range
	 *
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopeStaff($query) {
		$ranks = config('ranks');
		$minStaffRank = 10;

		foreach($ranks as $num => $rank) {
			if($rank['staff'] == true) {
				$minStaffRank = $num;
			}
		}

		return $query->where('rank', '>=', $minStaffRank);
	}

	/**
	 * Create a rank object based off the User's rank number
	 *
	 * @return object
	 */
	public function getRankAttribute() {
		$rank = (object) config('ranks.' . $this->attributes['rank']);
		$rank->id = $this->attributes['rank'];

		return $rank;
	}

	/**
	 * Sanitize and parse the User's bio
	 * @return mixed
	 */
	public function getBioAttribute() {
		$bbcode = new BBCodeParser();
		$bio = htmlentities($this->attributes['bio'], ENT_QUOTES, 'UTF-8', false);

		return $bbcode->parse($bio);
	}

}
