<script>
    $( document ).ready(function() {
        console.log( "times loaded" );


    $('td.time').click(function() {

            console.log("clicked time");
            $('td.time').removeClass('selected');
            $(this).addClass('selected');
            var timeid = $(this).attr('id');
            $("input[name='time']").attr('value', timeid);

    });

});
</script>
<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:40 PM
 */


echo '<table><tr>';
echo 'day: '.$date_id.'<br>';
foreach ($times as $t=>$time){
    $disabled = $time['disabled']?' disabled':'';
    if($t==9) { echo'</tr><tr>';
    }
            echo('<Td class="time'.$disabled.'" id="'.($t+1).'">' .$time['time']. '</td>');

    }
echo'</tr></table>';