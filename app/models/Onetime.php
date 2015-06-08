<?php
/*
This file is part of Mayfly.

Copyright (C) 2014 Jan-Jorre Laurens <dratone@gmail.com>

Mayfly is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Mayfly is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Mayfly.  If not, see <http://www.gnu.org/licenses/>.

*/
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Onetime extends Eloquent {

	protected $fillable = array('encrypted');
	
}
