<?php

use Illuminate\Database\Migrations\Migration;

class AddOnetime extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::Create('onetimes',function($t) {

			$t->increments('id');
			$t->text('encrypted');
                        $t->string('sender');
                        $t->string('lang',3);
                        $t->datetime('valid_untill');
			$t->timestamps();

		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::Drop('onetimes');
	}

}
