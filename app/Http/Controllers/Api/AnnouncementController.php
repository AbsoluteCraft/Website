<?php

namespace App\Http\Controllers\Api;

use App\Repositories\AnnouncementRepository;

class AnnouncementController extends ApiController {

	private $repo;

	public function __construct(AnnouncementRepository $announcementRepository) {
		$this->repo = $announcementRepository;
	}

	public function get() {
		$announcements = $this->repo->all();

		$messages = [];
		foreach($announcements as $announcement) {
			$messages[] = $announcement->message;
		}

		return $this->response($messages);
	}

}