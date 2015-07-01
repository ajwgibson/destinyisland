<?php

class RegistrationController extends BaseController {

    /**
     * Displays the registration page.
     */
	public function register()
	{
        $this->layout->with('subtitle', 'registration');
		$this->layout->content = View::make('registrations.register');
	}

    /**
     * Performs a booking search and displays the results.
     */
	public function search()
    {
        $name   = Input::get('name');

        if (empty($name)) {
            return Redirect::route('register')
                    ->with('message', 'You must provide a name');
        } 

        $bookings = 
        	Booking::where(function($query) use($name) {
                $query->where('bookings.first', 'LIKE', "%$name%")
                      ->orWhere('bookings.last', 'LIKE', "%$name%");
            })->get();

        $booking_count = $bookings->count();

        if ($booking_count == 0) 
        {
            return Redirect::route('register')
                    ->withInput()
                    ->with('message', 'No booking found!');
        } 
        else
        {
            $bookings->each(function($booking) {
                $booking->contact_name = $booking->most_recent_contact_name();
                $booking->contact_number = $booking->most_recent_contact_number();
                $booking->notes = $booking->most_recent_notes();
            });

            $this->layout->with('subtitle', 'registration');

            $this->layout->content = 
                View::make('registrations.register')
                    ->with('bookings', $bookings);
        }
    }

    /**
     * Creates a registration record for a booking.
     */
    public function register_booking()
    {
        $booking_id = Input::get('booking_id');

        $input = Input::all();

        $validator = 
            Validator::make(
                $input, 
                Registration::$rules);

        if ($validator->passes()) 
        {
        	$booking = Booking::findOrFail($booking_id);
        	$booking->registrations()->save(
                new Registration(
                    array(
                        'contact_name'   => Input::get('contact_name'),
                        'contact_number' => Input::get('contact_number'),
                        'notes'          => Input::get('notes'),
                    )
                ));

        	$print_label = Input::get('print_label', false);

            if ($print_label)
            {
                return 
                    Redirect::route(
                        'printLabel', 
                        array(
                            'booking_id' => $booking_id, 
                            'return_url' => rawurlencode(route('register'))
                        ))
                        ->with('info', 'Registration complete!');;
            }
            else
            {
                return Redirect::route('register')
        		            ->with('info', 'Registration complete!');
            }
        }
        else
        {
            $bookings = Booking::where('id', $booking_id)->get();

            $bookings->each(function($booking) {
                // Should actually only be one...
                $booking->contact_name = Input::get('contact_name');
                $booking->contact_number = Input::get('contact_number');
                $booking->notes = Input::get('notes');
            });

            $this->layout->with('subtitle', 'registration');
            $this->layout->withErrors($validator);

            $this->layout->content = 
                View::make('registrations.register')
                    ->with('bookings', $bookings)
                    ->with('errors',   $validator->messages());
        }
    }

    /**
     * Displays a tabular list of registrations.
     */
    public function index()
    {
        $this->layout->with('subtitle', 'registrations');

        $registrations = 
            Registration::orderBy('registrations.created_at', 'desc');

        $filtered = false;
        $filter_name = Session::get('registrations_filter_name',   '');
        $filter_day  = Session::get('registrations_filter_day',    '');

        if (!(empty($filter_name))) {
            $registrations = $registrations
                ->join('bookings', 'registrations.booking_id', '=', 'bookings.id', 'left outer')
                ->addSelect('registrations.*')
                ->addSelect('bookings.first')
                ->addSelect('bookings.last')
                ->where(function($query) use($filter_name) {
                    $query->where('bookings.first',       'LIKE', "%$filter_name%")
                          ->orWhere('bookings.last',      'LIKE', "%$filter_name%");
                }); 
            $filtered = true;
        }

        if (!(empty($filter_day))) {
            $registrations = $registrations->where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', $filter_day);
            $filtered = true;
        }

        $registrations = $registrations->paginate(25);

        $days = array(
            '' => 'Select a day',
            2  => 'Monday',
            3  => 'Tuesday',
            4  => 'Wednesday',
            5  => 'Thursday',
            6  => 'Friday'
        );

        $this->layout->content = 
            View::make('registrations.index')
                ->with('registrations', $registrations)
                ->with('filtered',      $filtered)
                ->with('filter_name',   $filter_name)
                ->with('days',          $days)
                ->with('filter_day',    $filter_day);
    }

    /**
     * Changes the list filter values in the session
     * and redirects back to the index to force the filtered
     * list to be displayed.
     */
    public function filter()
    {
        $filter_name = Input::get('filter_name');
        $filter_day  = Input::get('filter_day');
        
        Session::put('registrations_filter_name', $filter_name);
        Session::put('registrations_filter_day',  $filter_day);

        return Redirect::route('registrations');
    }

    
    /**
     * Removes the list filter values from the session
     * and redirects back to the index to force the 
     * list to be displayed.
     */
    public function resetFilter()
    {
        if (Session::has('registrations_filter_name'))  Session::forget('registrations_filter_name');
        if (Session::has('registrations_filter_day'))   Session::forget('registrations_filter_day');

        return Redirect::route('registrations');
    }

    /**
     * Retrieves and displays a single registration record.
     */
    public function show($id)
    {
        $registration = Registration::findOrFail($id);

        $this->layout->with('subtitle', 'registration details for ' . $registration->booking->name());
        $this->layout->content = 
            View::make('registrations.show')
                    ->with('registration', $registration);
    }

    /**
     * Shows the form for editing a registration.
     */
    public function edit($id)
    {
        $registration = Registration::findOrFail($id);

        $this->layout->with('subtitle', 'registration details for ' . $registration->booking->name());
        $this->layout->content = 
            View::make('registrations.edit')
                    ->with('registration', $registration);
    }

    /**
     * Updates a registration.
     */
    public function update($id)
    {
        $input = Input::all();

        $validator = 
            Validator::make(
                $input, 
                Registration::$rules);

        if ($validator->passes()) 
        {
            $registration = Registration::findOrFail($id);
            $registration->update($input);

            return Redirect::route('registration.show', $id);
        }

        return Redirect::route('registration.edit', $id)
            ->withInput()
            ->withErrors($validator);
    }

    /**
     * Deletes a registration.
     */
    public function destroy($id)
    {
        Registration::destroy($id);

        return Redirect::route('registration.index');
    }
}
