<p>Printing a label with the following information:</p>
<dl class="dl-horizontal">
	<dt>Name</dt>
	<dd>{{{ $booking->name() }}}</dd>
	<dt>Group</dt>
	<dd>{{{ $booking->group_number }}}</dd>
	<dt>Activities</dt>
	<dd>
		{{{ $booking->activity_1 }}}<br/>
		{{{ $booking->activity_2 }}}<br/>
		{{{ $booking->activity_3 }}}<br/>
	</dd>
</dl>

@section('extra_js')

<script type="text/javascript" src="{{ asset('dymo.label.framework.js') }}"></script>

<script type="text/javascript">
    
    $(function() {
        
        var printers = dymo.label.framework.getLabelWriterPrinters();

		if (printers.length == 0) {

		    alert("No DYMO printers are installed. Install DYMO printers.");

	    } else {

	        $.ajax({
				type:     "GET",
				url:      "{{ asset('DestinyIsland.label') }}",
				dataType: "text",
				success: function(data) {

					var label = dymo.label.framework.openLabelXml(data);

					label.setObjectText("NAME", "{{{ $booking->label_name() }}}");
			    	label.setObjectText("GROUP", "{{{ $booking->group_number }}}");
			    	label.setObjectText("ACTIVITIES", "{{{ $booking->label_activities() }}}");

			    	label.print(printers[0].name);

			    	window.location.replace('{{ rawurldecode($return_url) }}');
				}
			});
	    	
	    }

    });
    
</script>

@endsection