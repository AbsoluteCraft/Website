<?php

namespace App\Repositories;

use App\Libs\MulticraftAPI;
use Illuminate\Support\Facades\Log;

class MulticraftRepository {

	private $client;

	private $servers = [
		'bungee' => 1,
		'creative' => 2,
		'survival' => 3
	];

	public function __construct() {
		$this->client = new MulticraftAPI(env('MULTICRAFT_URL'), env('MULTICRAFT_USER'), env('MULTICRAFT_KEY'));
	}

	public function __call($method, $arguments) {
		$response = call_user_func_array([$this->client, $method], $arguments);

		if($response['errors']) {
			Log::error($response['errors']);

			return null;
		}

		return $response['data'];
	}

	public function getOnlinePlayers() {
		$players = [];
		foreach($this->servers as $id) {
			$response = $this->getServerStatus($id, true);
			if($response['players']) {
				foreach($response['players'] as $player) {
					$players[] = $player;
				}
			}
		}

		return $players;
	}

	public function getGlobalServerResources() {
		$resources = [];
		$averageCpu = 0;
		$averageMem = 0;
		foreach($this->servers as $name => $id) {
			$resources[$name] = $this->getServerResources($id);
			$averageCpu += $resources[$name]['cpu'];
			$averageMem += $resources[$name]['memory'];
		}

		$averageCpu = $averageCpu / count($resources);
		$averageMem = $averageMem / count($resources);
		$resources['average'] = [
			'cpu' => round($averageCpu),
			'memory' => round($averageMem)
		];

		return $resources;
	}

}
