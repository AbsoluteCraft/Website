<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShopControllerTest extends TestCase {

    public function testShopLoads() {
        $this->visit(route('shop'))
			->seeStatusCode(200);
    }

    public function testShopDonate() {
    	$resp = $this->actingAs(\App\Models\User::find(1))
			->post(route('shop.donate'), [
				'rank' => 'vip'
			]);

    	$resp->assertResponseStatus(200);
		$resp->assertViewHas('fields');
	}

}
