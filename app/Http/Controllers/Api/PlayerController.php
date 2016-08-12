<?php

namespace App\Http\Controllers\Api;

use App\Player\Player;
use App\Repositories\PlayerRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayerController extends ApiController {

	private $repo;

	public function __construct(PlayerRepository $playerRepository) {
		$this->repo = $playerRepository;
	}

	public function get($uuid) {
		if(strlen($uuid) <= 16) {
			$player = $this->repo->getByUsername($uuid);
		} else {
			$player = $this->repo->getByUUID($uuid);
		}

		return $this->response($player);
	}

	public function update(Request $request) {
		$this->validate($request, [
			'id' => 'required'
		]);

		$player = $this->repo->get($request->get('uuid'));
		if($player == null) {
			return $this->error('Player not found', 404);
		}

		$player = $player->update($request->all());

		return $this->response($player);
	}

	public function create(Request $request) {
		$this->validate($request, [
			'uuid' => 'required|unique:players'
		]);

		$player = new Player();
		$player = $player->update($request->all());

		return $this->response($player, 201);
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
