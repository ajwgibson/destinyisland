<?php

class PrintoutController extends BaseController {

    public function index($day = 'monday', $group = 1)
    {
        $this->layout->with('subtitle', 'group printout');

        $dow = date('N', strtotime($day));

        $registrations = 
            Registration::join('bookings', 'registrations.booking_id', '=', 'bookings.id')
                ->where(DB::raw('DAYNAME(registrations.created_at)'), '=', $day)
                ->where('bookings.group_number', $group)
                ->orderBy('bookings.first')
                ->orderBy('bookings.last')
                ->get();

        $groups = Booking::distinct('group_number')->orderBy('group_number')->lists('group_number', 'group_number');

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

}
