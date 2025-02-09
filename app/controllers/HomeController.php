<?php

class HomeController extends BaseController {

	public function index()
	{
		$this->layout->with('subtitle', 'home');

		$registrations_by_group =
			DB::table('registrations')
					->join('bookings', 'registrations.booking_id', '=', 'bookings.id')
					->select(
						DB::raw(
							'bookings.group_name, count(registrations.id) as registered'))
					->groupBy('bookings.group_name')
					->where(DB::raw('DATE(registrations.created_at)'), DB::raw('CURDATE()'))
					->orderBy('bookings.group_name')
					->get();

		$this->layout->content = 
			View::make('home')
					->with('registrations_by_group', $registrations_by_group);
	}

}
