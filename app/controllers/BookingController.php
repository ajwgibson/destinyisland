<?php

class BookingController extends BaseController {

	public function index()
	{
        $this->layout->with('subtitle', 'bookings');

        $bookings = Booking::orderBy('last')->orderBy('first');

        $filtered = false;
		$filter_name        = Session::get('bookings_filter_name',        '');
        $filter_activity_1  = Session::get('bookings_filter_activity_1',  '');
        $filter_activity_2  = Session::get('bookings_filter_activity_2',  '');
        $filter_activity_3  = Session::get('bookings_filter_activity_3',  '');
        $filter_group       = Session::get('bookings_filter_group',       '');

        if (!(empty($filter_name))) {
            $bookings = $bookings
                ->where(function($query) use($filter_name) {
                    $query->where('bookings.first', 'LIKE', "%$filter_name%")
                          ->orWhere('bookings.last', 'LIKE', "%$filter_name%");
                });	
            $filtered = true;
        }

        if (!(empty($filter_activity_1))) {
            $bookings = $bookings->where('activity_1', $filter_activity_1);
            $filtered = true;
        }

        if (!(empty($filter_group))) {
            $bookings = $bookings->where('group_name', $filter_group);
            $filtered = true;
        }

		$bookings = $bookings->paginate(25);

        $activities = array( '' => 'Select an activity...' )
                        + Booking::distinct('activity_1')->orderBy('activity_1')->lists('activity_1', 'activity_1')
                        + Booking::distinct('activity_2')->orderBy('activity_2')->lists('activity_2', 'activity_2')
                        + Booking::distinct('activity_3')->orderBy('activity_3')->lists('activity_3', 'activity_3');

        $groups = array( '' => 'Select a group...' ) 
                        + Booking::distinct('group_name')->orderBy('group_name')->lists('group_name', 'group_name');

		$this->layout->content = 
			View::make('bookings.index')
				->with('bookings', $bookings)
				->with('filtered', $filtered)
                ->with('filter_name', $filter_name)
                ->with('activities', $activities)
                ->with('filter_activity_1', $filter_activity_1)
                ->with('filter_activity_2', $filter_activity_2)
                ->with('filter_activity_3', $filter_activity_3)
                ->with('groups', $groups)
                ->with('filter_group', $filter_group);
	}

	/**
     * Changes the list filter values in the session
     * and redirects back to the index to force the filtered
     * list to be displayed.
     */
    public function filter()
    {
        $filter_name        = Input::get('filter_name');
        $filter_activity_1  = Input::get('filter_activity_1');
        $filter_activity_2  = Input::get('filter_activity_2');
        $filter_activity_3  = Input::get('filter_activity_3');
        $filter_group       = Input::get('filter_group');
        
        Session::put('bookings_filter_name',        $filter_name);
        Session::put('bookings_filter_activity_1',  $filter_activity_1);
        Session::put('bookings_filter_activity_2',  $filter_activity_2);
        Session::put('bookings_filter_activity_3',  $filter_activity_3);
        Session::put('bookings_filter_group',       $filter_group);

        return Redirect::route('bookings');
    }

	
	/**
     * Removes the list filter values from the session
     * and redirects back to the index to force the 
     * list to be displayed.
     */
    public function resetFilter()
    {
        if (Session::has('bookings_filter_name'))        Session::forget('bookings_filter_name');
        if (Session::has('bookings_filter_activity_1'))  Session::forget('bookings_filter_activity_1');
        if (Session::has('bookings_filter_activity_2'))  Session::forget('bookings_filter_activity_2');
        if (Session::has('bookings_filter_activity_3'))  Session::forget('bookings_filter_activity_3');
        if (Session::has('bookings_filter_group'))       Session::forget('bookings_filter_group');

        return Redirect::route('bookings');
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $booking = new Booking();

        $this->layout->with('subtitle', 'add a new booking');

        $this->layout->content =
            View::make('bookings.create')
                    ->with('booking', $booking);
    }


    /**
     * Store a newly created booking.
     */
    public function store()
    {
        $input = Input::all();

        $validator = 
            Validator::make(
                $input, 
                Booking::$rules,
                Booking::$messages);

        if ($validator->passes())
        {
            Booking::create($input);
            return Redirect::route('booking.index');
        }

        return Redirect::route('booking.create')
            ->withInput()
            ->withErrors($validator);
    }

    /**
     * Retrieves and displays a single booking record.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        $this->layout->with('subtitle', 'booking details for ' . $booking->name());
        $this->layout->content = 
            View::make('bookings.show')
                    ->with('booking', $booking);
    }

    /**
     * Shows the form for editing a booking.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        $this->layout->with('subtitle', 'booking details for ' . $booking->name());
        $this->layout->content = 
            View::make('bookings.edit')
                    ->with('booking', $booking);
    }

    /**
     * Updates a booking.
     */
    public function update($id)
    {
        $input = Input::all();

        $validator = 
            Validator::make(
                $input, 
                Booking::$rules,
                Booking::$messages);

        if ($validator->passes()) {

            $booking = Booking::findOrFail($id);
            $booking->update($input);

            return Redirect::route('booking.show', $id);
        }

        return Redirect::route('booking.edit', $id)
            ->withInput()
            ->withErrors($validator);
    }

    /**
     * Deletes a booking.
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        return Redirect::route('booking.index');
    }

    /**
     * Exports the original booking data ignoring any changes recorded at registration.
     */
    public function exportOriginal()
    {
        $bookings = Booking::all();
        
        $view = View::make('bookings.export')->with('bookings', $bookings);

        return Response::make($view)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', "attachment; filename='bookings-original.csv'");
    }

    /**
     * Exports the booking data including any changes recorded at registration.
     */
    public function exportLatest()
    {
        $bookings = Booking::all();

        $bookings->each(
            function($booking) {
                $booking->contact_name = $booking->most_recent_contact_name();
                $booking->contact_number = $booking->most_recent_contact_number();
                $booking->notes = $booking->most_recent_notes();
                $booking->photos_permitted = $booking->most_recent_photos_permitted();
                $booking->outings_permitted = $booking->most_recent_outings_permitted();
                return $booking;
            });
        
        $view = View::make('bookings.export')->with('bookings', $bookings);

        return Response::make($view)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', "attachment; filename='bookings-latest.csv'");
    }

}
