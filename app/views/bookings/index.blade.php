

<div>
    {{ link_to_route('booking.create', 'Add a new booking', array(), array('class' => 'btn btn-primary')) }}
</div>  

<div class="pull-right">
    <a class="btn" data-toggle="collapse" data-target="#filter">
        @if ($filtered)
        <span class="glyphicon glyphicon-warning-sign"></span>
        @endif
        Filter bookings
        <span class="caret"></span>
    </a>
</div>

<div class="clearfix"></div>

<div id="filter" class="filter collapse">

    {{ Form::open(array('route' => array('bookings.filter'))) }}

    <div class="col-sm-12 panel panel-default">

    	<div class="col-sm-3">

            <div class="form-group">
                {{ Form::label('filter_activity_1', 'Activity 1 (Monday)', array ('class' => 'control-label')) }}
                <div>
                    {{ Form::select('filter_activity_1', $activities, $filter_activity_1, array ('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('filter_activity_2', 'Activity 2 (Tuesday)', array ('class' => 'control-label')) }}
                <div>
                    {{ Form::select('filter_activity_2', $activities, $filter_activity_2, array ('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('filter_activity_3', 'Activity 3 (Wednesday)', array ('class' => 'control-label')) }}
                <div>
                    {{ Form::select('filter_activity_3', $activities, $filter_activity_3, array ('class' => 'form-control')) }}
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="form-group">
                {{ Form::label('filter_group', 'Group number', array ('class' => 'control-label')) }}
                <div>
                    {{ Form::select('filter_group', $groups, $filter_group, array ('class' => 'form-control')) }}
                </div>
            </div>

        </div>

        <div class="col-sm-6">

            <div class="form-group">
                {{ Form::label('filter_name', 'Child\'s name', array ('class' => 'control-label')) }}
                <div>
                	{{ Form::text('filter_name', $filter_name, array ('class' => 'form-control')) }}
                </div>
        		<p class="help-block">You can enter a full or partial first or last name, but not both</p>
            </div>

        </div>

        <div class="col-sm-6 col-sm-offset-6">
            {{ Form::submit('Apply filters', array('class' => 'btn btn-info')) }}

            {{ link_to_route(
                'bookings.resetfilter', 
                'Reset filters', 
                $parameters = array( ), 
                $attributes = array( 'class' => 'btn btn-default' ) ) }}

        </div>

    </div>

    {{ Form::close() }}

</div>



<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>First name</th>
            <th>Last name</th>
			<th>School year</th>
            <th>Age</th>
			<th>Contact</th>
			<th>Activities</th>
			<th>Group</th>
            <th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($bookings as $booking)
		<tr>
            <td>{{{ $booking->first }}}</td>
			<td>{{{ $booking->last }}}</td>
			<td>{{{ $booking->school_year }}}</td>
			<td>{{{ $booking->age }}}</td>
			<td>{{{ $booking->contact_details() }}}</td>
            <td>{{{ $booking->activity_1 }}}, {{{ $booking->activity_2 }}}, {{{ $booking->activity_3 }}}</td>
			<td>{{{ $booking->group_number }}}</td>
            <td>{{ link_to_route(
                    'booking.show', 
                    'Show details', 
                    $parameters = array( 'id' => $booking->id), 
                    $attributes = array( 'class' => '')) }}</td>
		</tr>
	@endforeach
	</tbody>
</table>

<div class="pull-right">
    {{ $bookings->links() }}
</div>