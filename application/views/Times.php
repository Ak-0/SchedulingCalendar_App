<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:40 PM
 */
echo '<table><tr>';
foreach ($times as $t=>$time){
    if ($t == 13){
      echo'  </tr><tr>';
    }
    if ($t <= 7 || $t >= 18){}
    else {
        echo '<td>' . $time . '</td>';
    }
}
echo'</tr></table>';