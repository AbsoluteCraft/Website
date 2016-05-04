<?php

namespace App\Repositories;

class MojangRepository {

	private $baseUrl = 'https://api.mojang.com/';

	public function getUserInfo($username) {
		return $this->call('users/profiles/minecraft/' . urlencode($username));
	}

	public function getNames($uuid) {
		$result = $this->call(sprintf('user/profiles/%s/names', urlencode($uuid)));

		$names = array();

		foreach ($result as $singleResult) {
			$names[] = $singleResult->name;
		}

		return $names;
	}

	private function call($url) {
		$url = $this->baseUrl . $url;
		$json = file_get_contents($url);

		return json_decode($json);
	}

}