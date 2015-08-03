
<h2 class="visible-print">{{{ $group }}}, {{{ $day }}}</h2>

<div class="hidden-print">

    {{ Form::open(array('route' => 'doGroupPrintout', 'class' => 'form-inline')) }}

    <div class="form-group">
        {{ Form::label('day', 'Day', array ('class' => '')) }}
        {{ Form::select(
                'day', 
                array(
                    'Monday' => 'Monday', 
                    'Tuesday' => 'Tuesday',
                    'wednesday' => 'Wednesday',
                    'Thursday' => 'Thursday',
                    'Friday' => 'Friday',
                    ), 
                $day, 
                array ('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('group', 'Group', array ('class' => '')) }}
        {{ Form::select('group', $groups, $group, array ('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Apply filters', array('class' => 'btn btn-default form-control')) }}

    {{ Form::close() }}
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>School year<br/>&amp; age</th>
            <th>Contact details</th>
            <th>Photos permitted</th>
            <th>Outings permitted</th>
            <th>Activities</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($registrations as $registration)
        <tr>
            <td>{{{ $registration->booking->first }}} {{{ $registration->booking->last }}}</td>
            <td>{{{ $registration->booking->school_year }}} ({{{ $registration->booking->age }}})</td>
            <td>{{{ $registration->contact_details() }}}</td>
            <td>{{ $registration->photos_permitted ? 'Yes' : "<strong>No</strong>" }}</td>
            <td>{{ $registration->outings_permitted ? 'Yes' : "<strong>No</strong>" }}</td>
            <td>{{{ $registration->booking->activities() }}}</td>
            <td>{{{ $registration->notes }}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="javascript:window.print();" class="btn btn-primary pull-right hidden-print">
    <i class="glyphicons print"></i>&nbsp;Print
</a>