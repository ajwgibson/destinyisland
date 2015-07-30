<?php

class PrintoutController extends BaseController {

    public function index($day = 'monday', $group = 1)
    {
        $this->layout->with('subtitle', 'group printout');

        $dow = date('N', strtotime($day));

        $registrations = 
            Registration::join('bookings', 'registrations.booking_id', '=', 'bookings.id')
                ->select('registrations.*')
                ->where(DB::raw('DAYNAME(registrations.created_at)'), '=', $day)
                ->where('bookings.group_name', $group)
                ->orderBy('bookings.first')
                ->orderBy('bookings.last')
                ->get();

        $groups = Booking::distinct('group_name')->orderBy('group_name')->lists('group_name', 'group_name');

        $this->layout->content = 
            View::make('printouts.index')
                    ->with('day', ucwords($day))
                    ->with('group', $group)
                    ->with('registrations', $registrations)
                    ->with('groups', $groups);
    }

    public function doPrintout()
    {
        $day   = Input::get('day');
        $group = Input::get('group');

        return Redirect::route('printout', array('day' => $day, 'group' => $group));
    }

    public function printLabel($booking_id, $return_url)
    {
        $booking = Booking::findOrFail($booking_id);
        $this->layout->with('subtitle', 'label printing');
        $this->layout->content = 
            View::make('printouts.label')
                    ->with('booking', $booking)
                    ->with('return_url', $return_url);
    }

}
