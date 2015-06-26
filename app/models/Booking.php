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
        $registration = $this->most_recent_registration();

        if ($registration && $registration->contact_name) return $registration->contact_name;
        else return $this->contact_name;
    }

    // Returns the most recent contact number from daily registrations or the original from the booking
    public function most_recent_contact_number()
    {
        $registration = $this->most_recent_registration();

        if ($registration && $registration->contact_number) return $registration->contact_number;
        else return $this->contact_number;
    }

    // Returns the most recent notes from daily registrations or the original from the booking
    public function most_recent_notes()
    {
        $registration = $this->most_recent_registration();
        
        if ($registration && $registration->notes) return $registration->notes;
        else return $this->notes;
    }




    // Returns the most recent registration record for this booking (if any)
    private function most_recent_registration()
    {
        if ($this->registrations->count() > 0) return $this->registrations()->orderBy('created_at', 'desc')->first();
        else return null;
    }

}