

<div class="row">

    <div class="col-sm-9">

    	@if (Session::has('info'))
        <div class="alert alert-info alert-dismissable">
            <p>{{ Session::get('info') }}</p>
        </div>
        @elseif (isset($info))
        <div class="alert alert-info alert-dismissable">
            <p>{{{ $info }}}</p>
        </div>
        @endif

        @if (Session::has('message'))
        <div class="alert alert-danger alert-dismissable">
            <p>{{ Session::get('message') }}</p>
        </div>
        @elseif (isset($message))
        <div class="alert alert-danger alert-dismissable">
            <p>{{{ $message }}}</p>
        </div>
        @endif

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
                <em><strong>Hint:</strong> Try the first or last name, but not both. <br/>
                If you're not sure of the correct spelling try putting in just part of the name. </em>
            </p>
        </div>

        {{ Form::submit('Search', array ('class' => 'btn btn-default')) }} 

        {{ Form::close() }}

        @if (isset($bookings))

            <p style="margin-top: 20px;">The following bookings have matched the search criteria. Pick one to continue or search again.</p>

        	@foreach ($bookings as $booking)

            {{ Form::open(array('route' => 'register.booking', 'class' => 'form-horizontal')) }}
            {{ Form::hidden('booking_id', $booking->id) }}

			<div class="panel panel-primary panel-search-result">

                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">{{{ $booking->first }}} {{{ $booking->last }}}</h3>
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
                                <dt>Notes</dt>
                                <dd>{{{ $booking->notes }}}</dd>
                            </dl>
                        </div>
        						
                        <div class="col-sm-8">

            				<div class="form-group">
                        		{{ Form::label('contact_name', 'Contact name', array ('class' => 'col-sm-4 control-label')) }}
                                <div class="col-sm-8">
                        		  {{ Form::text('contact_name', '', array ('class' => 'form-control')) }}
                                </div>
                        	</div>

                            <div class="form-group">
                                {{ Form::label('contact_number', 'Contact number', array ('class' => 'col-sm-4 control-label')) }}
                                <div class="col-sm-8">
                                    {{ Form::text('contact_number', '', array ('class' => 'form-control')) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('notes', 'Additional notes', array ('class' => 'col-sm-4 control-label')) }}
                                <div class="col-sm-8">
                                    {{ Form::textarea('notes', '', array ('class' => 'form-control', 'size' => '20x3' )) }}
                                    <p class="help-block">
                                        Specifically for today i.e. don't re-enter notes already recorded with the booking.
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
            				        {{ Form::submit('Register', array ('class' => 'btn btn-primary')) }} 
                                </div>
                            </div>

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
