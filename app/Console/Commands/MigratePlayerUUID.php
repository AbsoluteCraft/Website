<?php

namespace App\Console\Commands;

use App\Models\Player\Player;
use Illuminate\Console\Command;

class MigratePlayerUUID extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'migrate:player';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Trim player UUIDs';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire() {
		$players = Player::get();

		foreach($players as $player) {
			$player->uuid = str_replace('-', '', $player->uuid);
			$this->info($player->uuid);

			if($player->isDirty()) {
				$player->save();
				$this->info('Saved ' . $player->username . ' with trimmed UUID');
			}
		}
	}

}