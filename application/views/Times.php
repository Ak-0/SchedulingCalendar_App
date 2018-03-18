<?php
if(  $admin ){echo'<script type="application/javascript" src="'. base_url().'js/admin_times.js"></script>';}
else echo'<script type="application/javascript" src="'. base_url().'js/times.js"></script>';


/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:40 PM
 */


echo '<table class="admin_times">';
echo 'day: '.$date_id.'<br>';
if ($admin){
if(!empty($times)) {
    foreach ($times as $t => $time) {
        echo '<tr><thead><td>Time</td><td>Name</td><td>Phone</td><td>Notes</td><td>Email</td></thead></tr>';
        echo '<Td class="time" id="' . ($t + 1) . '">' . $time['time'] . ' </td><td> ' . $time['name'] .' </td><td> ' . $time['phone'] . ' </td><td> '. $time['notes'] . ' </td><td> '.$time['email'] . '</td>';

    }
}
else echo 'no times found';

}
else {
    foreach ($times as $t => $time) {
        $disabled = $time['disabled'] ? ' disabled' : '';
        if ($t == 9) {
            echo '</tr><tr>';
        }
        echo('<Td class="time' . $disabled . '" id="' . ($t + 1) . '">' . $time['time'] . '</td>');

    }
}
echo'</table>';

