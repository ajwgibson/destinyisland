
{{ Form::open(array('route' => 'booking.store')) }}

@include('bookings._form', array ( 'button' => 'Save new booking' ))

{{ Form::close() }}
