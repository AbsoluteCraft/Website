<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motd extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	public $table = 'motd';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'icon', 'message', 'type',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

}