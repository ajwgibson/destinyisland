
<p class="required-warning">Required fields are marked with an asterisk.</p>

<div class="form-group {{ $errors->has('first') ? 'has-error' : '' }}">
    {{ Form::label('first', 'First name', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('first', $booking->first, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('last') ? 'has-error' : '' }}">
    {{ Form::label('last', 'Last name', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('last', $booking->last, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('school_year') ? 'has-error' : '' }}">
    {{ Form::label('school_year', 'School year', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('school_year', $booking->school_year, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
    {{ Form::label('age', 'Age', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('age', $booking->age, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('group_number') ? 'has-error' : '' }}">
    {{ Form::label('group_number', 'Group', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('group_number', $booking->group_number, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('activity_1') ? 'has-error' : '' }}">
    {{ Form::label('activity_1', 'Activity 1 (Monday)', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('activity_1', $booking->activity_1, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('activity_2') ? 'has-error' : '' }}">
    {{ Form::label('activity_2', 'Activity 2 (Tuesday)', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('activity_2', $booking->activity_2, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('activity_3') ? 'has-error' : '' }}">
    {{ Form::label('activity_3', 'Activity 3 (Wednesday)', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('activity_3', $booking->activity_3, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('contact_name') ? 'has-error' : '' }}">
    {{ Form::label('contact_name', 'Contact name', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('contact_name', $booking->contact_name, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
    {{ Form::label('contact_number', 'Contact number', array ('class' => 'control-label required')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::text('contact_number', $booking->contact_number, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
    {{ Form::label('notes', 'Notes', array ('class' => 'control-label')) }}
    <div class="row">
        <div class="col-sm-6">
            {{ Form::textarea('notes', $booking->notes, array ('class' => 'form-control')) }}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::submit($button, array ('class' => 'btn btn-primary')) }} 
</div>

