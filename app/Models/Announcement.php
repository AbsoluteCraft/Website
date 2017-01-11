<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	public $table = 'announcements';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'message',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
