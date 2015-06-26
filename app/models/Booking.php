<?php

class Booking extends Eloquent {
	
	protected $table = 'bookings';

	// Relationship: registrations
	public function registrations()
	{
		return $this->hasMany('Registration');
	}

    // Returns's the child's name
    public function name()
    {
        return $this->first . ' ' . $this->last;
    }

}