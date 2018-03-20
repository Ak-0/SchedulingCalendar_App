$( document ).ready(function() {
    console.log("times loaded");

    $('[name="time_slots"]').on("change", function () {
        if (!($(this).hasClass('disabled'))) {
            console.log("clicked time");
            var timeid = $('select option:selected').attr('value');
            $("input[name='time']").attr('value', timeid);
        }
    });

});