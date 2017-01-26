<?php

namespace App\Repositories;

use App\Models\PlayersOnline;
use Carbon\Carbon;

class PlayersOnlineRepository {

	public function load(Carbon $dateFrom, Carbon $dateTo) {
		$diff = $dateFrom->diffInMinutes($dateTo);

		$entries = PlayersOnline::orderBy('timestamp', 'desc')
			->whereBetween('timestamp', [$dateFrom, $dateTo])
			->take($diff)
			->get();

		if($diff > 1440) { // 1 day
			$amount = $diff / 1440;
			$scale = 'day';
		} else {
			$amount = 24;
			$scale = 'hour';
		}

		$playersOnline = [];

		for($i = 0; $i < $amount; $i++) {
			$dateT = clone $dateTo;
			$sub = 'sub' . ucfirst($scale) . 's' ;
			if($scale == 'day') {
				$date = $dateT->$sub($i)->startOfDay()->__toString();
			} else {
				$date = $dateT->$sub($i)->minute(0)->second(0)->__toString();
			}

			$playersOnline[$date] = 0;
		}

		foreach($playersOnline as $date => $online) {
			foreach($entries as $entry) {
				if($entry->online > $online) {
					if(Carbon::parse($entry->timestamp)->isSameDay(Carbon::parse($date))) {
						$playersOnline[$date] = $entry->online;
					}
				}
			}
		}

		$playersOnline = array_reverse($playersOnline);

		return [
			'data' => $playersOnline,
			'scale' => $scale,
			'amount' => $amount
		];
	}

}
