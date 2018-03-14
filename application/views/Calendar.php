<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Globalrose - Scheduling App</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="application/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url().'css/style.css'?>">
    <?php

    if(  $admin ){
        echo'<div class="login">logged in as '.$admin[0]['username'].'<form action="/Auth/logout" method="post"><input type="submit" value="Logout"></form></div>';
        echo'<script type="application/javascript" src="'. base_url().'js/admin_script.js"></script>';
    }
    else echo'<script type="application/javascript" src="'. base_url(). 'js/script.js"></script>';
?>
</head>
<body>

<div id="container">
    <h1><img src="<?php echo base_url().'/imgs/logo-globalrose-tm.png'?>"></h1>

    <div id="body">
<table>
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
    ?>
            <td colspan="7" style="height:40px;">
                <span style="clear: none"><a href="<?php echo '/month/'.add_or_sub_months($month,'sub');?>"> &lt; Previous </a></span>
                <span style="margin: 0 auto;position: relative;text-align: center;left: 30%; font-weight: bolder;"><?php echo current_month($month);?></span>
                <span style="float: right;"><a href="<?php echo '/month/'.add_or_sub_months($month,'plus');?>"> Next &gt;</a></span>     </thead>
    <tr>
        <th>Monday</th>   <th>Tuesday</th>    <th>Wedsday</th>   <th>Thursday</th>   <th>Friday</th>   <th>Saturday</th>   <th>Snuday</th>
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
        <h1>Select a date:</h1>
        <div class="" id ="times"></div>

        <div class="form-group" id="info" style="display: none;
    position: relative;"><br>
            <h1>Please Fill out the following info:</h1>
            <form action="/info" method="post">
                <input type="hidden" name="day" id="<?php $date_id?>">
                <input type="hidden" name="time">
                <input type="text" required name="name" class="form-item" placeholder="Name">
                <input type="number" required name="phone" class="form-item" placeholder="Phone Number"><br>
                <input type="email" required name="email" class="form-item" placeholder="E-Mail">
                <select name="notes" required class="form-item" value="Describe your inquiry">
                    <option disabled selected>--- Select an Item ---</option>
                     <option>Bridal Bouquet</option>
                    <option>Bridesmaid bouquets</option>
                    <option>Corsages</option>
                    <option>Centerpieces</option>
                </select>
                <br>
                <button type="submit" class="form-item">Submit</button>
            </form>
        </div>

        </div>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>