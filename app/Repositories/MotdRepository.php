<?php

namespace App\Repositories;

use App\Models\Motd;

class MotdRepository extends Repository {

	public function __construct() {
		parent::__construct(Motd::class);
	}

}
