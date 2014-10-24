<?php
/*
This file is part of Mayfly.

Copyright (C) 2014 Jan-Jorre Laurens <dratone@gmail.com>

Mayfly is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Foobar is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

*/
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
