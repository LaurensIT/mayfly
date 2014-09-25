<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Onetime extends Eloquent {

	protected $fillable = array('encrypted');
	
}