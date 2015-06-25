
<div class="pull-right">
    <a class="btn" data-toggle="collapse" data-target="#filter">
        @if ($filtered)
        <span class="glyphicon glyphicon-warning-sign"></span>
        @endif
        Filter registrations
        <span class="caret"></span>
    </a>
</div>

<div class="clearfix"></div>

<div id="filter" class="filter collapse">

    <div class="col-sm-6"></div>

    {{ Form::open(array('route' => array('registrations.filter'))) }}

    <div class="col-sm-6 panel panel-default">

    	<div class="col-sm-6">

            <div class="form-group">
                {{ Form::label('filter_day', 'Registration day', array('class' => 'control-label')) }}
                <div>
                    {{ Form::select('filter_day', $days, $filter_day, array ('class' => 'form-control')) }}
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
                'registrations.resetfilter', 
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
			<th>Name</th>
			<th>Group</th>
			<th>Date &amp; time</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($registrations as $registration)
		<tr>
			<td>{{{ $registration->booking->first }}} {{{ $registration->booking->last }}}</td>
			<td>{{{ $registration->booking->group_number }}}</td>
			<td>{{{ $registration->created_at }}}</td>
		</tr>
	@endforeach
	</tbody>
</table>

<div class="pull-right">
    {{ $registrations->links() }}
</div>