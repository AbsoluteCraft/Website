<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot() {
		view()->creator(
			'partials.header', 'App\Http\ViewComposers\MotdComposer'
		);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

}