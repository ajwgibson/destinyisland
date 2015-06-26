

<div class="row">

    <div class="col-sm-9">

        <p>Enter a child's name (the name on the booking) to search for a booking:</p>

        {{ Form::open(array('route' => 'register.search')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name', array ('class' => 'control-label')) }}
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::text('name', Input::get('name'), array ('class' => 'form-control')) }}
                </div>
            </div>
            <p class="help-block">
                <em><strong>Hint:</strong> Try the first or last name, but not both.
                If you're not sure of the correct spelling try putting in just part of the name. </em>
            </p>
        </div>

        {{ Form::submit('Search', array ('class' => 'btn btn-success')) }} 

        {{ Form::close() }}

        @if (isset($bookings))

            <p style="margin-top: 20px;">The following bookings have matched the search criteria. Pick one to continue or search again.</p>

        	@foreach ($bookings as $booking)
            
			<div class="panel panel-primary panel-search-result">

                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">{{{ $booking->name() }}}</h3>
                </div>
                
                <div class="panel-body">

                    <div class="row">

                        <div class="col-sm-4">
                            <dl>
                                <dt>School year</dt>
                                <dd>{{{ $booking->school_year }}}</dd>
                                <dt>Age</dt>
                                <dd>{{{ $booking->age }}}</dd>
                                <dt>Chosen activity</dt>
                                <dd>{{{ $booking->activity }}}</dd>
                                <dt>Group</dt>
                                <dd>{{{ $booking->group_number }}}</dd>
                            </dl>
                        </div>
        						
                        <div class="col-sm-8">

                            <?php $todays_registration = $booking->todays_registration(); ?>

                            @if ($todays_registration)

                            <p>{{{ $booking->name() }}} has already been registered today with the following details:</p>

                            <dl>
                                <dt>Registration time</dt>
                                <dd>{{{ $todays_registration->created_at->format('g:sa') }}}</dd>
                                <dt>Contact name</dt>
                                <dd>{{{ $todays_registration->contact_name }}}</dd>
                                <dt>Contact number</dt>
                                <dd>{{{ $todays_registration->contact_number }}}</dd>
                                <dt>Notes</dt>
                                <dd>{{ nl2br($todays_registration->notes) }}</dd>
                            </dl>

                            <p>
                                If you think that is an error, please use 
                                {{ link_to_route(
                                        'registration.show', 
                                        'this link', 
                                        $parameters = array( 'id' => $todays_registration->id), 
                                        $attributes = array( 'class' => '')) }}
                                to view the registration record and amend or remove it.
                            </p>

                            @else

                            {{ Form::open(array('route' => 'register.booking', 'class' => 'form-horizontal')) }}
                            {{ Form::hidden('booking_id', $booking->id) }}

            				<div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
                        		{{ Form::label('contact_name', 'Contact name', array ('class' => 'col-sm-4 control-label required')) }}
                                <div class="col-sm-8">
                        		  {{ Form::text('contact_name', $booking->contact_name, array ('class' => 'form-control')) }}
                                </div>
                        	</div>

                            <div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                                {{ Form::label('contact_number', 'Contact number', array ('class' => 'col-sm-4 control-label required')) }}
                                <div class="col-sm-8">
                                    {{ Form::text('contact_number', $booking->contact_number, array ('class' => 'form-control')) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('notes', 'Notes', array ('class' => 'col-sm-4 control-label')) }}
                                <div class="col-sm-8">
                                    {{ Form::textarea('notes', $booking->notes, array ('class' => 'form-control', 'size' => '20x3' )) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <p class="help-block">
                                        Please confirm the details above are correct and relevent for today and 
                                        amend if necessary before clicking the "Register" button.</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
            				        {{ Form::submit('Register', array ('class' => 'btn btn-primary')) }} 
                                </div>
                            </div>

                            @endif

                        </div>

                    </div>

                </div>

			</div>

            {{ Form::close() }}

            @endforeach

		@endif

    </div>

    <div class="col-sm-3">

    	<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Registration counters</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
				    <li class="list-group-item">Monday <span class="badge alert-info">{{{ 'todo' }}}</span></li>
				    <li class="list-group-item">Tuesday <span class="badge alert-info">{{{ 'todo' }}}</span></li>
                    <li class="list-group-item">Wednesday <span class="badge alert-info">{{{ 'todo' }}}</span></li>
                    <li class="list-group-item">Thursday <span class="badge alert-info">{{{ 'todo' }}}</span></li>
				    <li class="list-group-item">Friday <span class="badge alert-info">{{{ 'todo' }}}</span></li>
				</ul>
			</div>
		</div>

    </div>

</div>
