<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCc3Tables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cc3_account', function(Blueprint $table) {
        	$table->increments('id');
			$table->string('name', 50)->nullable()->default(null);
			$table->tinyInteger('infiniteMoney')->nullable()->default(0);
			$table->string('uuid', 36)->nullable()->default(null)->unique();
			$table->tinyInteger('ignoreACL')->default(0);
			$table->tinyInteger('bank')->default(0);

			$table->index('name', 'account_name_index');
		});

		Schema::create('cc3_acl', function(Blueprint $table) {
			$table->integer('account_id')->default(0);
			$table->string('playerName', 16);
			$table->tinyInteger('owner')->nullable()->default(null);
			$table->tinyInteger('balance')->nullable()->default(0);
			$table->tinyInteger('deposit')->nullable()->default(0);
			$table->tinyInteger('acl')->nullable()->default(0);
			$table->tinyInteger('withdraw')->nullable()->default(0);

			$table->primary(['account_id', 'playerName']);
		});

		Schema::create('cc3_balance', function(Blueprint $table) {
			$table->double('balance')->nullable()->default(null);
			$table->string('worldName');
			$table->integer('username_id')->default(0);
			$table->string('currency_id', 50);

			$table->primary(['worldName', 'username_id', 'currency_id']);
			$table->index('username_id', 'fk_balance_account');
			$table->index('currency_id', 'fk_balance_currency');
		});

		Schema::create('cc3_config', function(Blueprint $table) {
			$table->string('name', 30);
			$table->string('value');

			$table->primary('name');
		});

		Schema::create('cc3_currency', function(Blueprint $table) {
			$table->string('name', 50);
			$table->string('plural', 50)->nullable()->default(null);
			$table->string('minor', 50)->nullable()->default(null);
			$table->text('minorplural')->nullable()->default(null);
			$table->string('sign', 5)->nullable()->default(null);
			$table->tinyInteger('status')->nullable()->default(0);
			$table->tinyInteger('bankCurrency')->nullable()->default(0);

			$table->primary('name');
		});

		Schema::create('cc3_exchange', function(Blueprint $table) {
			$table->string('from_currency', 50);
			$table->string('to_currency', 50);
			$table->double('amount')->nullable()->default(1);

			$table->primary(['from_currency', 'to_currency']);
			$table->index('to_currency', 'fk_exchange_currencyto');
		});

		Schema::create('cc3_log', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('username_id')->nullable()->default(null);
			$table->string('type', 30)->nullable()->default(null);
			$table->string('cause', 50)->nullable()->default(null);
			$table->string('causeReason', 50)->nullable()->default(null);
			$table->string('worldName', 50)->nullable()->default(null);
			$table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->double('amount')->nullable()->default(null);
			$table->string('currency_id', 50)->nullable()->default(null);

			$table->index('username_id', 'fk_log_account');
			$table->index('currency_id', 'fk_log_currency');
		});

		Schema::create('cc3_worldgroup', function(Blueprint $table) {
			$table->string('groupName');
			$table->string('worldList')->nullable()->default(null);

			$table->primary('groupName');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
