<?php

class Booking extends Eloquent {
	
	protected $table = 'bookings';

    protected $fillable = array(
        'first', 'last', 'school_year', 'age', 'group_name', 
        'activity_1', 'activity_2', 'activity_3', 
        'contact_name', 'contact_number', 'notes',
        'photos_permitted', 'outings_permitted');

    public static $rules = array(
        'first'          => 'required|max:100',
        'last'           => 'required|max:100',
        'school_year'    => 'required|max:10',
        'age'            => 'required|integer',
        'group_name'     => 'required|max:25',
        'activity_1'     => 'required|max:100',
        'activity_2'     => 'required|max:100',
        'activity_3'     => 'required|max:100',
        'contact_name'   => 'required|max:100',
        'contact_number' => 'required|max:20',
    );

    public static $messages = array(
        'first.required'    => "The first name field is required.",
        'first.max'         => "The first name may not be greater than :max characters.",
        'last.required'     => "The last name field is required.",
        'last.max'          => "The last name may not be greater than :max characters.",
    );


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

    // Returns the child's name
    public function label_name()
    {
        return $this->first . '\n' . $this->last;
    }

    // Returns the activities in a single, comma separated string
    public function activities()
    {
        return $this->activity_1 . ', ' . $this->activity_2 . ', ' . $this->activity_3;
    }

    // Returns the activities in a single, newline separated string
    public function label_activities()
    {
        return $this->activity_1 . '\n' . $this->activity_2 . '\n' . $this->activity_3;
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

    // Returns the most recent photos permitted flag from daily registrations or the original from the booking
    public function most_recent_photos_permitted()
    {
        $registration = $this->most_recent_registration();
        
        if ($registration) return $registration->photos_permitted;
        else return $this->photos_permitted;
    }

    // Returns the most recent outings permitted flag from daily registrations or the original from the booking
    public function most_recent_outings_permitted()
    {
        $registration = $this->most_recent_registration();
        
        if ($registration) return $registration->outings_permitted;
        else return $this->outings_permitted;
    }

    // Returns today's registration for this booking (if any)
    public function todays_registration()
    {
        return $this->registrations()->where(DB::raw('DATE(registrations.created_at)'), '=', DB::raw('current_date'))->first();
    }

    // Returns true if this booking has had no registrations yet
    public function has_never_registered()
    {
        return $this->registrations->count() == 0;
    }







    // Returns the most recent registration record for this booking (if any)
    private function most_recent_registration()
    {
        if ($this->registrations->count() > 0) return $this->registrations()->orderBy('created_at', 'desc')->first();
        else return null;
    }

    

}