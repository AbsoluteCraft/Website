<?php

namespace App\Models\Shop;

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

}