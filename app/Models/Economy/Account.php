<?php

namespace App\Models\Economy;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	public $table = 'cc3_account';

	public function balance() {
		return $this->hasOne(Balance::class, 'username_id', 'id');
	}

}
