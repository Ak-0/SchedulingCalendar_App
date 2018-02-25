<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">

        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }

        body {
            background-color: #fff;
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
        }

        table, td{
            border: 1px solid black;
            border-style: groove;
            border-radius: 4.2px;
            min-width:50px;
            padding: 4px;
            height:50px;
        }

        tr td:hover{
            background-color: whitesmoke;
            cursor: pointer;
            text-decoration: underline;
            color: #0d6aad;

        }
        .disabled, .disabled:hover{
            background-color: whitesmoke;
            cursor: not-allowed !important;
            color: unset;
            text-decoration: unset;
        }
        thead td:hover{
            background-color: transparent;
            text-decoration: unset;
            color: unset;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>GlobalRose - Calendar App!</h1>
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
            $dayofmonth = date('j',strtotime($day['date']));
            $date = date('w',strtotime($day['date']));
            if ($w == 0 && $k == 0)
            {
                switch($date){
                    case '1':
                        echo'<td>'. $dayofmonth .' </td>';

                        break;
                    case '2':
                        echo'<td class="disabled"></td><td>'. $dayofmonth .' </td>';

                        break;
                    case '3':
                        echo'<td class="disabled"></td><td class="disabled"></td><td>'. $dayofmonth .' </td>';
                        break;
                    case '4':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td>'. $dayofmonth .' </td>';
                        break;
                    case '5':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td>'. $dayofmonth.' </td>';
                        break;
                    case '6':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td>'. $dayofmonth .' </td>';
                        break;
                    case '0':
                        echo'<td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled"></td><td class="disabled">'. $dayofmonth .' </td>';
                        echo'</tr><Tr>';
                        break;

                }

            }

            elseif ($date == 0) {
                echo'<td class="disabled">'. $dayofmonth .' </td>';
                echo '</tr><Tr>';

            }
            else {
                echo'<td>'. $dayofmonth .' </td>';

            }
        }

    }
    ?>


</table><div class="container" style="float:right;
    position: absolute;
    top: 70px;
    left: 60%;">
        <h1>Selected Time Slots Available:</h1></div>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>