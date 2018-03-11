$( document ).ready(function() {
    console.log("times loaded");

    $('td.time').on("click", function () {
        if (!($(this).hasClass('disabled'))) {
            console.log("clicked time");
            $('td.time').removeClass('selected');
            $(this).addClass('selected');
            var timeid = $(this).attr('id');
            $("input[name='time']").attr('value', timeid);
        }
    });

});