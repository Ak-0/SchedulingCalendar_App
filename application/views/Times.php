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
            echo '<span hidden name="today" id="'.$date_id.'"></span>';
            echo '<table class="admin_times">';
            echo '<tr><thead><td>Done</td><td>Time</td><td>Name</td><td>Phone</td><td>Notes</td><td>Email</td><td>EventDate</td><td>Edit</td><td>Delete</td></thead></tr>';
            foreach ($times as $t => $time) {
                $disabled = isset($time[0]->done) ? ' disabled' : '';
                echo '<tr class="'.$disabled.'">
                       <td class="no-edit mark-done">
                      <a '.$disabled.' class="'.$disabled.' mark-done" id="'.$time[0]->id_date.'" value="'.$time[0]->id_time.'" href="#">
                      <i style="font-size: x-large;color: #4e4a4a;" class="fa fa-check"></i>
                       </a></td>
                       <Td name="id_time" class="no-edit time" id="'.$time[0]->id_time . '">'  .$time['time'] . ' </td>
                       <td name="name"> ' . $time[0]->name .' </td><td name="phone"> ' . $time[0]->phone . ' </td>
                       <td name="notes"> '. $time[0]->notes . ' </td><td name="email"> '.$time[0]->email . '</td>
                       <td name="event_date" id="cell-'.$t.'" value="'.$time[0]->id_date.'"> '.$time[0]->event_date . '</td>
                       <td class="no-edit" >
                       <a '.$disabled.' class="'.$disabled.' edit-apptmt" id="'.$time[0]->id_date.'" value="'.$time[0]->id_time.'" href="#">
                       <i style="font-size: x-large;color: #4e4a4a;" class="fa fa-edit"></i></td>
                       </a>
                       <td class="no-edit ">
                       <a '.$disabled.' class="no-edit '.$disabled.'" href="'.base_url().'Time/delApptmt/'.$time[0]->id_time.'/'.$time[0]->id_date.'">
                       <i style="font-size: x-large;color: #d0d;" class="fa fa-trash-o"></i></td>
                       </a>
                       </tr>
                       
                       ';

            }
        }
        else echo '<table class="admin_times"><tr><Td>No appointments found</Td></tr>';
            echo'</table>';
        }
else {
    echo '<select style="width: 220px;margin-right: 10px;" class="form-item" name="time_slots" required>';
    echo "<option value='' selected disabled hidden>Select an Available Time</option>";

    foreach ($times as $t => $time) {
        $disabled = $time['disabled'] ? ' disabled' : '';

        echo('<option '. $disabled .' class="time' . $disabled . '" value="' . ($t + 1) . '">' . $time['time'] . '</option>');

    }
    echo '</select>';
}


