<?php

class Registration extends Eloquent {
	
	protected $table = 'registrations';

	protected $fillable = array('contact_name', 'contact_number', 'notes');

	// Eager loading
    protected $with = array('booking');

	// Relationship: booking
	public function booking()
	{
		return $this->belongsTo('Booking');
	}

}