<?php

View::composer(array('home', 'registrations.register'), function($view)
{
	$expected = Booking::get()->count();

    $monday    = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 2)->count();
    $tuesday   = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 3)->count();
    $wednesday = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 4)->count();
    $thursday  = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 5)->count();
    $friday    = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 6)->count();

	$view->with('expected',  $expected)
		 ->with('monday',    $monday)
         ->with('tuesday',   $tuesday)
         ->with('wednesday', $wednesday)
         ->with('thursday',  $thursday)
		 ->with('friday',    $friday);
});