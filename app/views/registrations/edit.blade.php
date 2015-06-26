
{{ Form::model($registration, array('method' => 'PUT', 'route' => array('registration.update', $registration->id))) }}

@include('registrations._form', array ( 'button' => 'Update this registration' ))

{{ Form::close() }}
