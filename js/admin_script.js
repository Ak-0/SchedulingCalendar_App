$( document ).ready(function() {
    console.log("admin script loaded");

    if ($('#month_current').length){
        $('#admin_list_times').load('/time', {admin: true});
    }

    $('td.day').on( "click", function(){
        if(!($(this).hasClass('disabled')))
        {
            console.log("clicked day");
            $('td.day').removeClass('selected');
            $(this).addClass('selected');
            var dateid = $(this).attr('id');
            $('#admin_list_times').load('/time', {dateid: dateid, admin: true});
            //$('#info').show();
            $("input[name='day']").attr('value', dateid);
        }
    });
});


