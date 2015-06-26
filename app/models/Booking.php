<?php

class Booking extends Eloquent {
	
	protected $table = 'bookings';


	// Relationship: registrations
	public function registrations()
	{
		return $this->hasMany('Registration');
	}

    // Returns the child's name
    public function name()
    {
        return $this->first . ' ' . $this->last;
    }

    // Returns the contact details in a single string
    public function contact_details()
    {
        if ($this->contact_name) 
        {
            if ($this->contact_number) 
            {
                return "$this->contact_name ($this->contact_number)";
            } 
            else 
            {
                return $this->contact_name;
            }
        } 
        else 
        {
            if ($this->contact_number) 
            {
                return $this->contact_number;
            }
        }

        return '';
    }

    // Returns the most recent contact name from daily registrations or the original from the booking
    public function most_recent_contact_name()
    {
        $name = $this->contact_name;

        if ($this->registrations->count() > 0)
        {
            $latest_registration = $this->registrations()->orderBy('created_at', 'desc')->first();
            if ($latest_registration->contact_name) $name = $latest_registration->contact_name;
        }

        return $name;
    }

    // Returns the most recent contact name from daily registrations or the original from the booking
    public function most_recent_contact_number()
    {
        $number = $this->contact_number;

        if ($this->registrations->count() > 0)
        {
            $latest_registration = $this->registrations()->orderBy('created_at', 'desc')->first();
            if ($latest_registration->contact_number) $number = $latest_registration->contact_number;
        }

        return $number;
    }

}