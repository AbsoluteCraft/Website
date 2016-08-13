<?php

namespace App\Http\ViewComposers;

class CartComposer {

	public function create($view) {
		$cart = session()->get('cart');

		$view->with('cart', $cart);
	}

}