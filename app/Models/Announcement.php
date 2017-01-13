<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model {

	public $table = 'announcements';

	protected $fillable = [
		'message',
	];

	protected $hidden = [];

	public function user() {
		return $this->belongsTo(User::class, 'added_by');
	}

}
