<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase {

    public function testHomepageLoads() {
        $this->visit(route('home'))
			->seeStatusCode(200);
    }

}
