$('.action').change(function() {
	if($(this).val() != '')
	{
		var query = $(this).val();
		$.ajax({
			url: "../ScheduleController/multiSelect",
			method: "POST",
			data: {query: query},
			success:function(data)
			{
				$('#name').html(data);
			}
		});
	}
});
