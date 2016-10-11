<?php

namespace App\Http\Controllers;

use App\Models\Shop\Donation;
use App\Models\Shop\Item;
use App\Models\Shop\Order;
use App\Repositories\PlayerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller {

	private $playerRepository;

	public function __construct(PlayerRepository $playerRepository) {
		$this->playerRepository = $playerRepository;
	}

	public function get() {
		$tokens = 0;

		if(Auth::user()) {
			$player = $this->playerRepository->getFromUser(Auth::user());
			if($player) {
				$tokens = $player->tokens;
			}
		}

		return view('shop.shop', [
			'tokens' => $tokens
		]);
	}

	public function buy(Request $request) {
		$this->validate($request, [
			'item_id' => 'required'
		]);

		$item = Item::findOrFail($request->get('item_id'));

		$player = $this->playerRepository->getFromUser(Auth::user());
		$tokens = $player->tokens;

		if($tokens < $item->price) {
			flash_message('You do not have enough tokens', 'danger');
			return redirect()->back();
		}

		$order = Order::where('user_id', Auth::user()->id)
			->where('item_id', $item->id);

		if($order && $item->can_order_many == false) {
			flash_message('You can only buy one ' . $item->nice_name, 'danger');
			return redirect()->back();
		}

		$this->playerRepository->update($player, [
			'tokens' => ($tokens - $item->price)
		]);

		$order = Order::create([
			'user_id' => Auth::user()->id,
			'item_id' => $item->id,
			'tokens' => $item->price
		]);

		switch($item->runs) {
			case 'command':
				// Connect to the server and run a command
				break;
			case 'script':
				// Run the PHP script for the item
				$class = 'App\Libs\ShopScripts\\' . $item->runs_data;
				$refl = new \ReflectionClass($class);
				if($refl) {
					$instance = $refl->newInstanceArgs([$this->playerRepository, Auth::user(), $order]);
					$instance->run();
				}
				break;
		}

		flash_message('You just bought ' . $item->nice_name . '!', 'success');
		return redirect()->route('shop');
	}

	public function donate(Request $request) {
		$this->validate($request, [
			'rank' => 'required'
		]);

		$amount = 5.00;
		if($request->has('amount')) {
			$amount = $request->get('amount');
		}

		Donation::create([
			'user_id' => Auth::user()->id,
			'rank' => $request->get('rank'),
			'amount' => $amount
		]);

		$fields = array(
			'cmd' => '_xclick',
			'business' => 'dan@danbovey.uk',
			'item_name' => 'VIP',
			'amount' => $amount,
			'on0' => 'uuid',
			'os0' => Auth::user()->uuid,
			'page_style' => 'AbsoluteCraft',
			'no_shipping' => 1,
			'no_note' => 1,
			'rm' => 2,
			'currency_code' => 'GBP',
			'lc' => 'GB',
			'cbt' => 'Return to AbsoluteCraft',
			'notify_url' => route('shop.paypal.ipn'),
			'return' => 'https://absolutecraft.co.uk/shop/donate/complete', // TODO: Make these routes
			'cancel_return' => 'https://absolutecraft.co.uk/shop/donate/cancelled'
		);

		return view('shop.donate-post', [
			'fields' => $fields
		]);
	}

}
