
<div class="col-sm-6">
    <dl class="dl-horizontal">
        
        <dt>School year</dt>
        <dd>{{{ $booking->school_year }}}</dd>

        <dt>Age</dt>
        <dd>{{{ $booking->age }}}</dd>

        <dt>Activity 1 (Monday)</dt>
        <dd>{{{ $booking->activity_1 }}}</dd>

        <dt>Activity 2 (Tuesday)</dt>
        <dd>{{{ $booking->activity_2 }}}</dd>

        <dt>Activity 3 (Wednesday)</dt>
        <dd>{{{ $booking->activity_3 }}}</dd>

        <dt>Group</dt>
        <dd>{{{ $booking->group_name }}}</dd>

        <dt>Photos permitted</dt>
        <dd><span class="label label-{{{ $booking->photos_permitted ? 'success' : 'danger' }}}">{{{ $booking->photos_permitted ? 'Yes' : 'No' }}}</span></dd>

        <dt>Outings permitted</dt>
        <dd><span class="label label-{{{ $booking->outings_permitted ? 'success' : 'danger' }}}">{{{ $booking->outings_permitted ? 'Yes' : 'No' }}}</span></dd>

        <dt>Contact name</dt>
        <dd>{{{ $booking->contact_name }}}</dd>

        <dt>Contact number</dt>
        <dd>{{{ $booking->contact_number }}}</dd>

        <dt>Notes</dt>
        <dd>{{ nl2br($booking->notes) }}</dd>

    </dl>
</div>

<div class="col-sm-6 hidden-print">

    {{ Form::open(
        array(
            'method' => 'DELETE', 
            'route' => array('booking.destroy', $booking->id),
            'class' => 'delete' ) ) }}

    <div style="margin-bottom:10px;">
        {{ link_to_route(
            'booking.edit', 
            'Edit this booking', 
            $parameters = array( 'id' => $booking->id), 
            $attributes = array( 'class' => 'btn btn-primary')) }}
    </div>

    <div style="margin-bottom:10px;">
        {{ Form::button(
            'Delete this booking', 
            array(
                'class' => 'btn btn-danger',
                'data-toggle' => 'modal',
                'data-target' => '#modal' )) }}
    </div>

    {{ Form::close() }}

</div>

<div class="col-sm-12">
    <h2>Registrations</h2>
    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>Date and time</th>
                <th>Contact details</th>
                <th>Notes</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($booking->registrations->sortBy('created_at') as $registration)
                <tr>
                    <td>{{{ $registration->created_at->timezone('Europe/London')->format('l jS F, g:ia') }}}</td>
                    <td>{{{ $registration->contact_details() }}}</td>
                    <td>{{ nl2br($registration->notes) }}</td>
                    <td>
                        {{ link_to_route(
                            'registration.show', 
                            'View details', 
                            array($registration->id), 
                            array('class' => '')) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p class="text-danger" style="font-size: 2em;">
            <span class="glyphicon glyphicon-warning-sign"></span> Warning
        </p>
        <p>
            You are about to delete this booking, are you sure you want to continue?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No, cancel</button>
        <button type="button" id="continue" class="btn btn-danger">Yes, continue</button>
      </div>
    </div>
  </div>
</div>


@section('extra_js')

<script type="text/javascript">
    
    $('#continue').click(function() {
        $('form.delete').submit();
    });
    
</script>

@endsection