$( document ).ready(function() {
    console.log("admin times loaded");

    $('td.time').on("click", function () {
            console.log("clicked time");
            $(this).addClass('selected');
            var timeid = $(this).attr('id');
            $("input[name='time']").attr('value', timeid);

    });

});