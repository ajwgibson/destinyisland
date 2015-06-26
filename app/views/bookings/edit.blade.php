
{{ Form::model($booking, array('method' => 'PUT', 'route' => array('booking.update', $booking->id))) }}

@include('bookings._form', array ( 'button' => 'Update this booking' ))

{{ Form::close() }}
