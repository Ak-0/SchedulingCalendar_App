$( document ).ready(function() {
    console.log( "calendar loaded" );

    $('td.day').click(function(){
        if(!($(this).hasClass('disabled')))
        {
            console.log("clicked day");
            $('td.day').removeClass('selected');
            $(this).addClass('selected');
            var dateid = $(this).attr('id');
            $('#times').load('../time', {dateid: dateid});
            $('#info').show();
            $("input[name='day']").attr('value', dateid);
        }
    });
    $('td.time').click(function() {

        console.log("clicked time");
        $('td.time').removeClass('selected');
        $(this).addClass('selected');
        var timeid = $(this).attr('id');
        $("input[name='time']").attr('value', timeid);

    });


});