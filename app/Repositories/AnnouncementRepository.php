<?php

namespace App\Repositories;

use App\Models\Announcement;

class AnnouncementRepository extends Repository {

	public function __construct() {
		parent::__construct(Announcement::class);
	}

}