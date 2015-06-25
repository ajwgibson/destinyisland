<?php

class Booking extends Eloquent {
	
	protected $table = 'bookings';

	// Relationship: registrations
	public function registrations()
	{
		return $this->hasMany('Registration');
	}

}