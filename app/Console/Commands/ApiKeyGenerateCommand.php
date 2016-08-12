<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ApiKeyGenerateCommand extends Command {

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'api:generate {--show : Display the key instead of modifying files}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Set the API key';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire() {
		$key = str_random(64);
		$secure = bcrypt($key);

		if ($this->option('show')) {
			return $this->comment($key);
		}
		// Next, we will replace the application key in the environment file so it is
		// automatically setup for this developer.
		$this->setKeyInEnvironmentFile($secure);
		$this->info("API key [" . $key . "] set successfully.");
	}

	/**
	 * Set the application key in the environment file.
	 *
	 * @param  string  $key
	 * @return void
	 */
	protected function setKeyInEnvironmentFile($key) {
		file_put_contents(app()->environmentFilePath(), str_replace(
			'API_KEY=' . env('API_KEY'),
			'API_KEY=' . $key,
			file_get_contents(app()->environmentFilePath())
		));
	}

}