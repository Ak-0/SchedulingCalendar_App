<script type="application/javascript" src="<?php echo base_url().'js/times.js'?>"></script>

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
    $disabled = $time['disabled'] ? ' disabled' : '';
    if($t==9) { echo'</tr><tr>';
    }
            echo('<Td class="time'.$disabled.'" id="'.($t+1).'">' .$time['time']. '</td>');

    }
echo'</tr></table>';

