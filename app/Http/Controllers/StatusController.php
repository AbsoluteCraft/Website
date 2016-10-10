<?php

namespace App\Http\Controllers;

use App\Libs\MulticraftAPI;

class StatusController extends Controller {

	public function get() {
		$servers = [];
		$api = new MulticraftAPI('http://mc-ac.com/panel/api.php', 'admin', 'SjEgNbX*EG9QPd');
		$response = $api->listServers();

		if($response['data']) {
			$list = $response['data']['Servers'];

			foreach($list as $id => $name) {
				$server = $api->getServer($id);

				if($server['data']) {
					$name = $server['data']['Server']['name'];
					if($name == 'BungeeCord') {
						$name = 'Lobby';
					}

					$status = $api->getServerStatus($id);

					if($status['data']) {
						$servers[$name] = array_merge($status['data'], [
							'online' => $status['data']['status'] == 'online'
						]);
					}
				}
			}
		}

		return view('status.status', [
			'servers' => $servers
		]);
	}

}