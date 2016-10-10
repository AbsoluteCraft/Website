<?php

namespace App\Libs\ShopScripts;

use App\Models\Shop\Order;
use App\Models\User;
use App\Repositories\PlayerRepository;

interface ShopScript {

	public function __construct(PlayerRepository $playerRepository, User $user, Order $order);

	public function run();

}