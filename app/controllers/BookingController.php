<?php

class BookingController extends BaseController {

	public function index()
	{
        $this->layout->with('subtitle', 'Bookings');

        $bookings = Booking::orderBy('last')->orderBy('first');

        $filtered = false;
		$filter_name      = Session::get('bookings_filter_name',      '');
        $filter_activity  = Session::get('bookings_filter_activity',  '');
        $filter_group     = Session::get('bookings_filter_group',     '');

        if (!(empty($filter_name))) {
            $bookings = $bookings
                ->where(function($query) use($filter_name) {
                    $query->where('bookings.first', 'LIKE', "%$filter_name%")
                          ->orWhere('bookings.last', 'LIKE', "%$filter_name%");
                });	
            $filtered = true;
        }

        if (!(empty($filter_activity))) {
            $bookings = $bookings->where('activity', $filter_activity);
            $filtered = true;
        }

        if (!(empty($filter_group))) {
            $bookings = $bookings->where('group_number', $filter_group);
            $filtered = true;
        }

		$bookings = $bookings->paginate(25);

        $activities = array( '' => 'Select an activity...' ) 
                        + Booking::distinct('activity')->orderBy('activity')->lists('activity', 'activity');

        $groups = array( '' => 'Select a group...' ) 
                        + Booking::distinct('group_number')->orderBy('group_number')->lists('group_number', 'group_number');

		$this->layout->content = 
			View::make('bookings.index')
				->with('bookings', $bookings)
				->with('filtered', $filtered)
                ->with('filter_name', $filter_name)
                ->with('activities', $activities)
                ->with('filter_activity', $filter_activity)
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
        $filter_name      = Input::get('filter_name');
        $filter_activity  = Input::get('filter_activity');
        $filter_group     = Input::get('filter_group');
        
        Session::put('bookings_filter_name',      $filter_name);
        Session::put('bookings_filter_activity',  $filter_activity);
        Session::put('bookings_filter_group',     $filter_group);

        return Redirect::route('bookings');
    }

	
	/**
     * Removes the list filter values from the session
     * and redirects back to the index to force the 
     * list to be displayed.
     */
    public function resetFilter()
    {
        if (Session::has('bookings_filter_name'))      Session::forget('bookings_filter_name');
        if (Session::has('bookings_filter_activity'))  Session::forget('bookings_filter_activity');
        if (Session::has('bookings_filter_group'))     Session::forget('bookings_filter_group');

        return Redirect::route('bookings');
    }

}
