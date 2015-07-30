
<?php
	$colours = array( 
	    "#a6cee3", "#1f78b4", "#b2df8a", "#33a02c", "#fb9a99",
		"#e31a1c", "#fdbf6f", "#ff7f00", "#cab2d6", "#6a3d9a",
	);
?>

<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Registration totals for today</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-4 col-sm-6">
				<canvas id="registrationStatusChart" width="250" height="250"></canvas>
			</div>
			<div class="col-md-3 col-sm-6">
				<ul class="list-group">
				    <li class="list-group-item"><span style="background-color: #a6cee3; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Registered <span class="badge alert-info">{{{ $today }}}</span></li>
				    <li class="list-group-item"><span style="background-color: #1f78b4; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Still to register <span class="badge alert-info">{{{ $expected - $today }}}</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Registration totals for today by group</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-4 col-sm-6">
				<canvas id="registrationGroupStatusChart" width="250" height="250"></canvas>
			</div>
			<div class="col-md-3 col-sm-6">
				<ul class="list-group">
				@for ($i = 0; $i < count($registrations_by_group); $i++)
				    <li class="list-group-item"><span style="background-color: {{{ $colours[$i % count($colours)] }}}; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> {{{ $registrations_by_group[$i]->group_name }}} <span class="badge alert-info">{{{ $registrations_by_group[$i]->registered }}}</span></li>
				@endfor
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Registration totals by day</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-4 col-sm-6">
				<canvas id="registrationDayChart" width="250" height="250"></canvas>
			</div>
			<div class="col-md-3 col-sm-6">
				<ul class="list-group">
				    <li class="list-group-item legend"><span style="background-color: #a6cee3; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Monday <span class="badge alert-info">{{{ $monday }}}</span></li>
				    <li class="list-group-item legend"><span style="background-color: #1f78b4; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Tuesday <span class="badge alert-info">{{{ $tuesday }}}</span></li>
				    <li class="list-group-item legend"><span style="background-color: #b2df8a; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Wednesday <span class="badge alert-info">{{{ $wednesday }}}</span></li>
				    <li class="list-group-item legend"><span style="background-color: #33a02c; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Thursday <span class="badge alert-info">{{{ $thursday }}}</span></li>
				    <li class="list-group-item legend"><span style="background-color: #fb9a99; border-radius: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;</span> Friday   <span class="badge alert-info">{{{ $friday }}}</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>


@section('extra_js')

<script src="{{ asset('Chart.min.js') }}"></script>

<script type="text/javascript">

	// Useful chart colours:
	// #a6cee3, #1f78b4, #b2df8a, #33a02c, #fb9a99, #e31a1c, #fdbf6f, #ff7f00, #cab2d6, #6a3d9a

	var registration_status_data = [
		{ value: {{{ $today }}}, label: 'Registered', color: '#a6cee3', highlight: ColorLuminance('#a6cee3', 0.2) },
		{ value: {{{ $expected - $today }}}, label: 'Still to register', color: '#1f78b4', highlight: ColorLuminance('#1f78b4', 0.2) }
	];

	var ctx1 = document.getElementById("registrationStatusChart").getContext("2d");
	var pieChart1 = new Chart(ctx1).Doughnut(registration_status_data);

	var registration_days_data = [
		{ value: {{{ $monday }}},    label: 'Monday',    color: '#a6cee3', highlight: ColorLuminance('#a6cee3', 0.2) },
		{ value: {{{ $tuesday }}},   label: 'Tuesday',   color: '#1f78b4', highlight: ColorLuminance('#1f78b4', 0.2) },
		{ value: {{{ $wednesday }}}, label: 'Wednesday', color: '#b2df8a', highlight: ColorLuminance('#b2df8a', 0.2) },
		{ value: {{{ $thursday }}},  label: 'Thursday',  color: '#33a02c', highlight: ColorLuminance('#33a02c', 0.2) },
		{ value: {{{ $friday }}},    label: 'Friday',    color: '#fb9a99', highlight: ColorLuminance('#fb9a99', 0.2) },
	];

	var ctx2 = document.getElementById("registrationDayChart").getContext("2d");
	var pieChart2 = new Chart(ctx2).Doughnut(registration_days_data);

	var registrations_by_group_data = [
	@for ($i = 0; $i < count($registrations_by_group); $i++)
		{
	    	value: {{{ $registrations_by_group[$i]->registered }}},
	    	label: '{{{ $registrations_by_group[$i]->group_name }}}',
	    	color: '{{{ $colours[$i % count($colours)] }}}',
	    	highlight: ColorLuminance('{{{ $colours[$i % count($colours)] }}}', 0.2)
		},
	@endfor
	];

	var ctx3 = document.getElementById("registrationGroupStatusChart").getContext("2d");
	var pieChart3 = new Chart(ctx3).Doughnut(registrations_by_group_data);

	function ColorLuminance(hex, lum) {

		// validate hex string
		hex = String(hex).replace(/[^0-9a-f]/gi, '');
		if (hex.length < 6) {
			hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
		}
		lum = lum || 0;

		// convert to decimal and change luminosity
		var rgb = "#", c, i;
		for (i = 0; i < 3; i++) {
			c = parseInt(hex.substr(i*2,2), 16);
			c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
			rgb += ("00"+c).substr(c.length);
		}

		return rgb;
	}

</script>

@stop