<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motd extends Model {

	public $table = 'motd';

	protected $fillable = [
		'icon', 'message', 'type',
	];

	protected $hidden = [];

	public $timestamps = false;

}
