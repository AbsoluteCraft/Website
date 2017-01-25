<?php

namespace App\Http\Controllers;

use App\Repositories\MulticraftRepository;

class StatusController extends Controller {

	public function get() {
		$servers = [];
		$multicraft = new MulticraftRepository();
		$response = $multicraft->listServers();

		if($response != null) {
			$list = $response['Servers'];

			foreach($list as $id => $name) {
				$server = $multicraft->getServer($id);

				if($server) {
					$name = $server['Server']['name'];
					if($name == 'BungeeCord') {
						$name = 'Lobby';
					}

					$status = $multicraft->getServerStatus($id);

					if($status) {
						$servers[$name] = array_merge($status, [
							'online' => $status['status'] == 'online'
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