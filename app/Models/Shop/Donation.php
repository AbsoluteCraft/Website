<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model  {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'rank', 'amount'
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function getRankAttribute() {
		$ranks = config('ranks');
		$id = array_search($this->attributes['rank'], array_column($ranks, 'name'));
		$id += 1; // Seems to be indexing from 0 but ranks start from 1
		$rank = (object) $ranks[$id];
		$rank->id = $id;

		return $rank;
	}

}