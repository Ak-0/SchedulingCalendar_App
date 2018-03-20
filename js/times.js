$( document ).ready(function() {
    console.log("times loaded");

    $('[name="time_slots"]').on("change", function () {
        if (!($(this).hasClass('disabled'))) {
            console.log("clicked time");
            var timeid = $('select option:selected').attr('value');
            $("input[name='time']").attr('value', timeid);
        }
    });
    $("input[type='tel']").keyup(function() {
        var curchr = this.value.length;
        var curval = $(this).val();
        if (curchr == 3) {
            $(this).val("(" + curval + ")" + "-");
        } else if (curchr == 9) {
            $(this).val(curval + "-");
        }
    });

});