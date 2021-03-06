<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Globalrose - Scheduling App</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="application/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url().'css/style.css'?>">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <?php

    if(  $admin ){
        echo'<div class="login"><form action="/Auth/logout" method="post"><input type="submit" class="form-item" value="'.$admin[0]['username'].' Logout"></form></div>';
        echo'<script type="application/javascript" src="'. base_url().'js/admin_script.js"></script>';
    }
    else {
        echo '<script type="application/javascript" src="' . base_url() . 'js/script.js"></script>';
        echo '<div class="login"><form action="/admin" method="post"><input type="submit" value="Login" class="form-item"></form></div>';
    }?>
</head>
<body>

<div id="container">
    <h1><img src="<?php echo base_url().'/imgs/logo-globalrose-tm.png'?>"></h1>

    <div id="body">
        <?php if ($admin){
            if (monthIsToday($month)){echo "<span hidden id='month_current'></span>";}

            echo ' <h1>Active appointments</h1>';}
        else{
            echo ' <h1>Select Your Desired Date For Phone Support</h1>';
        } ?>

        <table class="dates">
    <thead class="month-heading">
    <?php
    function add_or_sub_months($month,$addorsub)
    {
        $plus = new DateTime($month);
        if ($addorsub == 'plus') {
            $plus->modify('+1 month');
            return $month = $plus->format('m');
        } elseif ($addorsub == 'sub') {
            $minus = new DateTime($month);
            $minus->modify('-1 month');
            return $month = $minus->format('m');
        }
    }
    function current_month($month){
        return date('F',strtotime($month));
    }
    function monthIsToday($month){
        $thismonth = new DateTime('now',new DateTimeZone('America/New_York'));
        $thismonth = date('F', $thismonth->getTimestamp());
        $month = date('F', strtotime($month));
        if ($thismonth == $month){
            return true;
        }
        else return false;

    }
    ?>
            <td colspan="7" style="height:40px;">
                <span style="clear: none"><a href="<?php echo '/month/'.add_or_sub_months($month,'sub');?>"> &lt; Previous </a></span>
                <span style="margin: 0 auto;position: relative;text-align: center;left: 25%; font-weight: bolder;font-size: larger;"><?php echo current_month($month);?></span>
                <span style="float: right;"><a href="<?php echo '/month/'.add_or_sub_months($month,'plus');?>"> Next &gt;</a></span>     </thead>
    <tr>
        <th>MON</th>   <th>TUES</th>    <th>WEND</th>   <th>THURS</th>   <th>FRI</th>   <th>SAT</th>   <th>SUN</th>
    </tr>
    <tr>
<?php

    foreach($weeks as $w=>$week){
        foreach($week as $k=>$day) {
            $dayid = $day['id'];
        if($admin){ $disabled = '';}else { $disabled = $day['date']<date('Y-m-d')?'disabled':''; }
            $dayofmonth = date('j',strtotime($day['date']));
            $date = date('w',strtotime($day['date']));

            if ($w == 0 && $k == 0)
            {
                switch($date){
                    case '1':
                        echo'<td class="day '.$disabled.'" id="' .$dayid.'">'. $dayofmonth .' </td>';

                        break;
                    case '2':
                        echo'<td class="disabled"></td><td class="day '.$disabled.'" id="' .$dayid.'">'. $dayofmonth .' </td>';

                        break;
                    case '3':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="day '.$disabled.'" id="' .$dayid.'">'. $dayofmonth .' </td>';
                        break;
                    case '4':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="day '.$disabled.'" id="' .$dayid.'">'. $dayofmonth .' </td>';
                        break;
                    case '5':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="day '.$disabled.'" id="' .$dayid.'">'. $dayofmonth.' </td>';
                        break;
                    case '6':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="day '.$disabled.'" id="' .$dayid.'">'. $dayofmonth .' </td>';
                        break;
                    case '0':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled" class="day '.$disabled.'" id="' .$dayid. '">'. $dayofmonth .' </td>';
                        echo'</tr><Tr>';
                        break;

                }

            }

            elseif ($date == 0) {
                echo'<td class="day disabled" id="'.$dayid.'">'. $dayofmonth .' </td>';
                echo '</tr><Tr>';

            }
            else {
                echo('<td class="day '.$disabled.'" id="'.$dayid.'">'. $dayofmonth .' </td>');

            }
        }

    }
    ?>


</table><div id="info-area" class="container" style="">
<?php if($admin){echo '<div class="" id ="admin_list_times"></div>';
}
    ?>

        <div class="form-group" id="info" style="display: none;
    position: relative;"><br>
            <p><br><Br></p><h1>Please fill the following info:</h1>
            <form action="/info" method="post">
                <div class="" id ="times"></div>
                <input type="hidden" name="day" id="<?php $date_id?>">
                <input type="hidden" name="time" required>
                <input type="text" required="required" name="name" class="form-item" placeholder="Your Name"><br>
                <input type="tel" required="required" name="phone" max="14" maxlength="14" class="phone form-item" placeholder="Phone Number">
                <input type="email" required="required" name="email" class="form-item" placeholder="E-Mail"><br>

                <input name="event_date" class="form-item" type="text" placeholder="Date of Event: " id ="datepicker">
                <select  name="notes" required="required" class="form-item">
                    <option value= "" selected disabled hidden>Describe your Occassion</option>
                    <option>Wedding</option>
                    <option>Funeral</option>
                    <option>Corsages</option>
                    <option>Party</option>
                    <option>Other, etc....</option>

                </select>
                <br>
                <button type="submit" class="form-item">Submit</button>
            </form>
        </div>

        </div>
    </div>

</div>

</body>
</html>