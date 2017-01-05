<?php

namespace App\Http\Controllers\Api;

use App\Models\Player\Player;
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
			'uuid' => 'required'
		]);

		$player = $this->repo->getByUUID($request->get('uuid'), true);

		return $this->response($player);
	}

	public function update(Request $request) {
		$this->validate($request, [
			'uuid' => 'required'
		]);

		$player = $this->repo->getByUUID($request->get('uuid'), true);
		$player = $player->update($request->except('uuid'));

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

		$player = $this->repo->getOrNew($request->get('uuid'), $request->get('username'));
		$player = $this->repo->update($player, [
			'online' => true
		]);

		return $this->response($player);
	}

	public function leave(Request $request) {
		$this->validate($request, [
			'uuid' => 'required'
		]);

		$player = $this->repo->getByUUID($request->get('uuid'), true);

		$player = $this->repo->update($player, [
			'online' => false,
			'last_seen' => Carbon::now()
		]);

		return $this->response($player);
	}

	public function addTokens(Request $request) {
		$this->validate($request, [
			'uuid' => 'required',
			'amount' => 'required'
		]);

		$player = $this->repo->getByUUID($request->get('uuid'), true);
		$player = $this->repo->update($player, [
			'tokens' => $player->tokens + $request->get('amount')
		]);

		return $this->response($player);
	}

	public function removeTokens(Request $request) {
		$this->validate($request, [
			'uuid' => 'required',
			'amount' => 'required'
		]);

		$player = $this->repo->getByUUID($request->get('uuid'), true);
		$player = $this->repo->update($player, [
			'tokens' => $player->tokens - $request->get('amount')
		]);

		return $this->response($player);
	}

}
