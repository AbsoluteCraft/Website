<?php

namespace App\Libs;

class DynmapGrid {

	public $url = 'http://map.mc-ac.com';

	public function generate($x, $z, $world, $map) {
		$grid = $this->buildGrid($x, $z);

		$images = [];
		foreach($grid as $chunk) {
			$regionCoords = $chunk['regionX'] . '_' . $chunk['regionZ'];
			$chunkCoords = $chunk['chunkX'] . '_' . $chunk['chunkZ'];
			$images[] = '<img src="' . $this->url . '/tiles/' . $world . '/' . $map . '/' . $regionCoords . '/' . $chunkCoords . '.png' . '">';
		}

		return $images;
	}

	public function buildGrid($x, $z, $radius = 0) {
		$grid = [];

		$coords = [
			[$x - 32, $z - 32],
			[$x, $z - 32],
			[$x + 32, $z - 32],
			[$x - 32, $z],
			[$x, $z],
			[$x + 32, $z],
			[$x - 32, $z + 32],
			[$x, $z + 32],
			[$x + 32, $z + 32]
		];

		foreach($coords as $coord) {
			$chunk = $this->getChunkAt($coord[0], $coord[1]);
			$region = $this->getRegionAt($chunk[0], $chunk[1]);

			$grid[] = [
				'x' => $coord[0],
				'z' => $coord[1],
				'chunkX' => $chunk[0],
				'chunkZ' => $chunk[1],
				'regionX' => $region[0],
				'regionZ' => $region[1]
			];
		}

		return $grid;
	}

	private function getChunkAt($x, $z) {
		return [
			$this->ceil($x / 32),
			$this->ceil($z / 32) * -1
		];
	}

	private function getRegionAt($chunkX, $chunkZ) {
		return [
			$this->ceil($chunkX / 32),
			floor($chunkZ / 32) - 1
		];
	}

	private function ceil($num) {
		if($num < 0) {
			return floor($num);
		} else {
			return ceil($num);
		}
	}

}
