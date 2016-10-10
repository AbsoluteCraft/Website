<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('shop_items', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('nice_name');
			$table->string('type');
			$table->integer('price');
			$table->boolean('pay_any_price')->default(0);
			$table->text('description');
			$table->boolean('can_order_many');
			$table->boolean('active')->default(1);
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
