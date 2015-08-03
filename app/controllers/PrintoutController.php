<?php

class PrintoutController extends BaseController {

    public function groupPrintout($day = 'monday', $group = 1)
    {
        $this->layout->with('subtitle', 'group print-out');

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
            View::make('printouts.group')
                    ->with('day', ucwords($day))
                    ->with('group', $group)
                    ->with('registrations', $registrations)
                    ->with('groups', $groups);
    }

    public function doGroupPrintout()
    {
        $day   = Input::get('day');
        $group = Input::get('group');

        return Redirect::route('printout.group', array('day' => $day, 'group' => $group));
    }

    public function activityPrintout($day = 'monday', $activity = '')
    {
        $this->layout->with('subtitle', 'activity print-out');

        $dow = date('N', strtotime($day));

        $activities = array( '' => 'Select an activity...' )
                        + Booking::distinct('activity_1')->orderBy('activity_1')->lists('activity_1', 'activity_1')
                        + Booking::distinct('activity_2')->orderBy('activity_2')->lists('activity_2', 'activity_2')
                        + Booking::distinct('activity_3')->orderBy('activity_3')->lists('activity_3', 'activity_3');

        $registrations = 
            Registration::join('bookings', 'registrations.booking_id', '=', 'bookings.id')
                ->select('registrations.*')
                ->where(DB::raw('DAYNAME(registrations.created_at)'), '=', $day);

        switch ($dow) {
            case 1 :
                $registrations = $registrations ->where('bookings.activity_1', $activity);
                break;
            case 2 :
                $registrations = $registrations ->where('bookings.activity_2', $activity);
                break;
            case 3 :
                $registrations = $registrations ->where('bookings.activity_3', $activity);
                break;
        }

        $registrations = 
            $registrations
                ->orderBy('bookings.first')
                ->orderBy('bookings.last')
                ->get();

        $this->layout->content = 
            View::make('printouts.activity')
                    ->with('day', ucwords($day))
                    ->with('activity', $activity)
                    ->with('registrations', $registrations)
                    ->with('activities', $activities);
    }

    public function doActivityPrintout()
    {
        $day      = Input::get('day');
        $activity = Input::get('activity');

        return Redirect::route('printout.activity', array('day' => $day, 'activity' => $activity));
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

    public function printLeadersLabel()
    {
        $this->layout->with('subtitle', 'print a leader label');
        $this->layout->content = 
            View::make('printouts.leaders-label');
    }

}
