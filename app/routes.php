<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::group(array('before' => 'auth.basic'), function()
{
    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

    Route::get('bookings',                array('as' => 'bookings',                'uses' => 'BookingController@index'));
    Route::post('bookings/filter',        array('as' => 'bookings.filter',         'uses' => 'BookingController@filter'));
    Route::get('bookings/resetfilter',    array('as' => 'bookings.resetfilter',    'uses' => 'BookingController@resetFilter'));
    Route::get('bookings/exportOriginal', array('as' => 'bookings.exportOriginal', 'uses' => 'BookingController@exportOriginal'));
    Route::get('bookings/exportLatest',   array('as' => 'bookings.exportLatest',   'uses' => 'BookingController@exportLatest'));
    Route::resource('booking', 'BookingController');
    
    Route::get('register',                  array('as' => 'register',                  'uses' => 'RegistrationController@register'));
    Route::post('search',                   array('as' => 'register.search',           'uses' => 'RegistrationController@search'));
    Route::post('register_booking',         array('as' => 'register.booking',          'uses' => 'RegistrationController@register_booking'));
    Route::get('registrations',             array('as' => 'registrations',             'uses' => 'RegistrationController@index'));  
    Route::post('registrations/filter',     array('as' => 'registrations.filter',      'uses' => 'RegistrationController@filter'));
    Route::get('registrations/resetfilter', array('as' => 'registrations.resetfilter', 'uses' => 'RegistrationController@resetFilter'));
    Route::resource('registration', 'RegistrationController');

    Route::get('groupPrintout/{day?}/{group?}', array('as' => 'printout.group',   'uses' => 'PrintoutController@groupPrintout'));
    Route::post('doPrintout',                   array('as' => 'doGroupPrintout',  'uses' => 'PrintoutController@doGroupPrintout'));

    Route::get('activityPrintout/{day?}/{activity?}', array('as' => 'printout.activity',   'uses' => 'PrintoutController@activityPrintout'));
    Route::post('doActivityPrintout',                 array('as' => 'doActivityPrintout',  'uses' => 'PrintoutController@doActivityPrintout'));
    
    Route::get('printLabel/{booking_id}/{return_url}',  array('as' => 'printLabel', 'uses' => 'PrintoutController@printLabel'));
    
    Route::get('printLeadersLabel',  array('as' => 'printLeadersLabel', 'uses' => 'PrintoutController@printLeadersLabel'));
});
