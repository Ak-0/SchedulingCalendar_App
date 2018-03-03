<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="application/javascript"></script>
<script>
    $( document ).ready(function() {
        console.log( "calendar loaded" );

    $('td.day').click(function(){
        console.log( "clicked day" );
        $('td.day').removeClass('selected');
        $(this).addClass('selected');
        var dateid = $(this).attr('id');
          $('#times').load('../time', {dateid: dateid});
            $('#info').show();
            $("input[name='day']").attr('value',dateid);
        });


    });
</script>
    <style type="text/css">

        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }

        body {
            background-color: gainsboro;
            margin: 10px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 0px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            background-color: whitesmoke;
            margin: 0 10px 0 10px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
            background-color: whitesmoke;
        }

        table, td{
            border: 1px solid black;
            border-style: groove;
            border-radius: 4.2px;
            min-width:50px;
            padding: 4px;
            height:50px;
        }
        #times table td{
            padding:0px;
            height: 30px;
            min-width: 30px;
            border-radius: 0px;
        }
        tr td:hover, .selected{
            background-color: darkgray;
            cursor: pointer;
            text-decoration: underline;
            color: #0d6aad;

        }
        .disabled, .disabled:hover{
            background-color: lightgray;
            cursor: not-allowed !important;
            color: unset;
            text-decoration: unset;
        }
        #info-area{
            float:right;
            position: absolute;
            top: 70px;
            left: 40%;
        }

        @media screen and (max-width: 1250px){
            #info-area{
                position: unset !important;
                float:unset !important;
                top: unset !important;
                left:unset !important;
            }

        }
        thead td:hover{
            background-color: transparent;
            text-decoration: unset;
            color: unset;
        }
        .form-item{
            padding:10px;
            background-color: whitesmoke;
            color: #474747;
            border: 1px solid lightgray;
            border-radius: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>GlobalRose - Support Scheduling </h1>
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
            $disabled = $day['date']<date('Y-m-d')?'disabled':'';
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
                echo'<td class="disabled" id="'.$dayid.'">'. $dayofmonth .' </td>';
                echo '</tr><Tr>';

            }
            else {
                echo('<td class="day '.$disabled.'" id="'.$dayid.'">'. $dayofmonth .' </td>');

            }
        }

    }
    ?>


</table><div id="info-area" class="container" style="">
        <h1>Selected Time Slots Available:</h1>
        <div class="" id ="times"></div>

        <div class="form-group" id="info" style="display: none;
    position: relative;"><br>
            <h1>Please Fill out the following info:</h1>
            <form action="/info" method="post">
                <input type="hidden" name="day" id="<?php $date_id?>">
                <input type="hidden" name="time">
                <input type="text" name="name" class="form-item" placeholder="Name">
                <input type="number" name="phone" class="form-item" placeholder="Phone Number"><br>
                <input type="email" name="email" class="form-item" placeholder="E-Mail">
                <select name="subject" class="form-item" value="Describe your inquiry">
                    <option selected><hr></option>
                    <option>Marriage Date Inquiry</option>
                    <option>Family Event Planning</option>
                    <option>Other...</option>
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