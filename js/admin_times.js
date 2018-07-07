$( document ).ready(function() {
    console.log("admin times loaded");
    var today = $('[name="today"]').attr('id');
    $('td.day#'+today).addClass('selected');

/*
    $('td.time').on("click", function () {
            console.log("clicked time");
            $(this).addClass('selected');
            var timeid = $(this).attr('id');
            $("input[name='time']").attr('value', timeid);

    });
*/
function selector(timeid,current,response, dateid) {
    var selecthtml = $("<select id='times_select'>");
    var selected = '';
    var disabled = '';
	 $.get('Time/get_disabled_times_ajax/'+dateid, function (disabled_times) {
		disabled_times = JSON.parse(disabled_times);
	$.each(response, function(key,valueObj){
		if(key === timeid){selected = 'selected';}
		is_in = $.inArray(key,disabled_times);
		console.log(is_in);
		if (is_in != '-1'){disabled = 'disabled = "true"';}
		else{disabled = '';}
		$(selecthtml).append($('<option '+disabled+ ' ' +selected+'></option>').val(key).html(valueObj));
		selected ='';
	});
	$(selecthtml).append("</select> ");
    $(current).html(selecthtml);
	 });
}

        $('#times_select').change( function () {
             //console.log($(this).val());
        });
    $.get('/Time/getTimes', function( data ) {
        var response = JSON.parse(data);

        $('[name=id_time].time').on('change',function () {
           select = $('[name=id_time].time option:selected');
            //console.log($(select).val());
            $('[name=id_time].time option').attr('selected',false);
            $(select).attr('selected','selected');
        });

        $('.edit-apptmt i').click( function () {
            var the_fields_insert = {};
            var current = $(this).parents('tr').children('[name=id_time].time');
            var timeid = $(current).attr('id');
            var dateid = $(this).parents('tr').children('[name="event_date"]').attr('value');

           // console.log('select');

            if(!($(this).hasClass('fa-edit'))){
                $(this).removeClass('fa-check-square-o');
                $(this).addClass('fa-edit');
                //$(current).html();
                do_edit = false;
            }
            else{
                $(this).removeClass('fa-edit');
                $(this).removeClass('fa-check-square-o');
                $(this).addClass('fa-check-square-o');
                selector(timeid, current,response,dateid);
                $(this).attr('style','color: limegreen; font-size:2em;');
                var do_edit = true;
            }
            var the_fields = $(this).parents().eq(2).children('td');
            $.each(the_fields, function(key,valueObj){
                var name =  $(valueObj).attr('name');
                var value = $(valueObj).text().trim();
                var slug = $(valueObj).attr('id');

                if(do_edit === true) {
                    if (!($(valueObj).hasClass('no-edit'))) {
                        $(valueObj).prop('contenteditable', true);

                    if (name === 'event_date') {
                        $('#' + slug).html('<input id="datepicker-' + slug + '" class="date datepicker" ></input>');
                        $("#datepicker-" + slug).datepicker({
                            dateFormat: "d MM, yy",
                            defaultDate: value
                        });

                        $('#datepicker-' + slug).datepicker("setDate", value);

                    }
                }
                }
                else{

                    if (name === 'event_date') {
                        value = $('#datepicker-'+slug).val();
                    }
                    if (!($(valueObj).hasClass('no-edit'))) {
                        the_fields_insert[name] = value;
                    }
                    $(valueObj).prop('contenteditable', false);
                }
            });
           if(do_edit ===false) {
               the_fields_insert['id_time'] = $("#"+timeid+" #times_select option:selected").val();
               $(current).parent(1).load('/time/editInfo/', {
                   dateid: dateid,
                   timeid: timeid,
                   fields : the_fields_insert
               }).fadeOut(3000);
           }
            //console.log(AJAXpackage);
            });
    });



    $('.mark-done').on("click", function () {
        var dateid = $(this).attr('id');
        var timeid = $(this).attr('value');
        if(!$(this).attr('disabled')){
            $('#admin_list_times').load('/time/mark/'+dateid+'/'+timeid, {mark: true});
        }

    });
});
