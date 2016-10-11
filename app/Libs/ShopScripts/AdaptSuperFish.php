<?php

namespace App\Libs\ShopScripts;

use App\Models\Game\Game;
use App\Models\Player\PlayerGame;
use App\Models\Player\Player;
use App\Models\Shop\Order;
use App\Models\User;
use App\Repositories\PlayerRepository;

class AdaptSuperFish implements ShopScript {

	private $playerRepository;
	private $user;
	private $order;

	public function __construct(PlayerRepository $playerRepository, User $user, Order $order) {
		$this->playerRepository = $playerRepository;
		$this->user = $user;
		$this->order = $order;
	}

	public function run() {
		$game = Game::where('name', 'adapt')->first();
		$player = $this->playerRepository->getFromUser($this->user);

		$config = $player->gameconfig->where('game_id', $game->id)->first();
		if(!$config) {
			$config = new PlayerGame([
				'player_id' => $player->id,
				'game_id' => $game->id,
				'config' => null
			]);
		}

		$json = [
			'superfish' => true
		];

		if($config->config) {
			$existing = json_decode($config->config, true);
			$json = array_merge($existing, $json);
		}

		$config->config = $json;
		$config->save();
	}

}