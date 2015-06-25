<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::group(array('before' => 'auth.basic'), function()
{
    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

    Route::get('bookings',             array('as' => 'bookings',             'uses' => 'BookingController@index'));
    Route::post('bookings/filter',     array('as' => 'bookings.filter',      'uses' => 'BookingController@filter'));
    Route::get('bookings/resetfilter', array('as' => 'bookings.resetfilter', 'uses' => 'BookingController@resetFilter'));
    
});
