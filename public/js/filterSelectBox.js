$('.action').change(function(){
    if($(this).val() != '')
    {
        var action = $(this).attr('id');
        var query = $(this).val();
        var result = '';
        if(action == 'subject')
        {
            result = 'doctor';
        }
        if(action == 'doctor')
        {
            result = 'calendar';
        }
        $.ajax({
            url: "../home/makeAppointment",
            method: "POST",
            data: {action: action, query: query},
            success: function(data)
            {
                $('#' + result).html(data);
            }
        });
    }
});