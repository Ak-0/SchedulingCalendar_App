<?php
if(  $admin ){echo'<script type="application/javascript" src="'. base_url().'js/admin_times.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
}
else echo'<script type="application/javascript" src="'. base_url().'js/times.js"></script>';


/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:40 PM
 */

if ($admin){
        if(!empty($times)) {
            echo '<table class="admin_times">';
            echo '<tr><thead><td>Done</td><td>Time</td><td>Name</td><td>Phone</td><td>Item</td><td>Email</td><td>EventDate</td></thead></tr>';
            foreach ($times as $t => $time) {
                $disabled = $time[0]->done ? ' disabled' : '';
                echo '<tr class="'.$disabled.'"><td><a '.$disabled.' class="'.$disabled.' mark-done" id="'.$time[0]->id_date.'" value="'.$time[0]->id_time.'" href="#"><i style="font-size: x-large;color: #4e4a4a;" class="fa fa-check-square-o"></i>
                       </a></td><Td class="time" id="' . ($t + 1) . '">'  .$time['time'] . ' </td><td> ' . $time[0]->name .' </td><td> ' . $time[0]->phone . ' </td><td> '. $time[0]->notes . ' </td><td> '.$time[0]->email . '</td><td> '.$time[0]->event_date . '</td></tr>';

            }
        }
        else echo '<table class="admin_times"><tr><Td>No appointments found</Td></tr>';
            echo'</table>';
        }
else {
    echo '<select class="form-item" name="time_slots" required>';
    echo "<option value='' selected disabled hidden>--- Select a Time ---</option>";

    foreach ($times as $t => $time) {
        $disabled = $time['disabled'] ? ' disabled' : '';

        echo('<option '. $disabled .' class="time' . $disabled . '" value="' . ($t + 1) . '">' . $time['time'] . '</option>');

    }
    echo '</select>';
}


