$( document ).ready(function() {
    console.log( "calendar loaded" );
    $('td.day').on( "click", function(){
        if(!($(this).hasClass('disabled')))
        {
            console.log("clicked day");
            $('td.day').removeClass('selected');
            $(this).addClass('selected');
            var dateid = $(this).attr('id');
            $('#times').load('/time', {dateid: dateid});
            $('#info').show();
            $("input[name='day']").attr('value', dateid);
        }
    });

});


