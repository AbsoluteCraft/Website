<?php

namespace App\Http\Controllers\Api;

use App\Repositories\PlayerRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayerController extends ApiController {

	private $repo;

	public function __construct(PlayerRepository $playerRepository) {
		$this->repo = $playerRepository;
	}

	public function get(Request $request) {
		$this->validate($request, [
			'uuid' => 'required',
			'username' => 'required'
		]);

		$player = $this->repo->get($request->get('uuid'), $request->get('username'));

		return $this->response($player);
	}

	public function join(Request $request) {
		$this->validate($request, [
			'uuid' => 'required',
			'username' => 'required'
		]);

		$player = $this->repo->getOrCreate($request->get('uuid'), $request->get('username'));

		$player->online = true;
		$player->save();

		return $this->response($player);
	}

	public function leave(Request $request) {
		$this->validate($request, [
			'uuid' => 'required'
		]);

		$player = $this->repo->get($request->get('uuid'));

		$player->online = true;
		$player->last_seen = Carbon::now();

		$player->save();

		return $this->response($player);
	}

}