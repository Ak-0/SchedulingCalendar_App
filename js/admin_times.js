$( document ).ready(function() {
    console.log("admin times loaded");
    var today = $('[name="today"]').attr('id');
    $('td.day#'+today).addClass('selected');

    $('td.time').on("click", function () {
            console.log("clicked time");
            $(this).addClass('selected');
            var timeid = $(this).attr('id');
            $("input[name='time']").attr('value', timeid);

    });

    $('.mark-done').on("click", function () {
        var dateid = $(this).attr('id');
        var timeid = $(this).attr('value');
        if(!$(this).attr('disabled')){
            $('#admin_list_times').load('/time/mark/'+dateid+'/'+timeid, {mark: true});
        }

    });
});