$(document).ready(function() {

	/** On change select **/

	$('select').change(function(){
		calculatePlan();
	});

	/** On change input minutes **/

	$('#minutes').on("input", function() {
    	calculatePlan();
	});

	/** Send data to Server for calculate rate **/

	function calculatePlan()
	{
		// set data to object
		var data = {
			origin: $('#origin').val(),
			destiny: $('#destiny').val(),
			minutes: $('#minutes').val(),
			plan: $('#plan').val()
		}

		// Valid data
		if (data.origin == "" || data.destiny == "" || data.minutes == "" || data.plan == "")
			return;

		// Send Request 
		$.ajax({
		  url: "api/plan/calculate",
		  type: "POST",
		  data: data,
		}).done(function(response) {
			// Init variables
			var with_plan = "Chamada não inclusa no Plano";
			var without_plan = "-";

			// Valid response
			if (typeof response.price !== 'undefined') {
				without_plan = "R$ " + response.price;
			} else {
				with_plan = "R$ " + response.with_plan;
				without_plan = "R$ " + response.without_plan;
			}

			// Set data in view
			$('.plan-result').text(with_plan);
			$('.without-plan-result').text(without_plan);
		});
	}

	$('.btn-simulator').click(function(){
		$("#plan").val($(this).attr('plan'));
		$('#btn-simulator').trigger('click');
	});
	$('[data-toggle=popover]').popover({placement: 'left'});
});