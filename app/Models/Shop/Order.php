<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	public $table = 'shop_orders';

	public $fillable = [
		'user_id',
		'item_id',
		'tokens'
	];

}