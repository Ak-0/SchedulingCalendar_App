<?php
require_once ('PDO_link.php');

$Startdate="2018-01-01";
$EndDate = strtotime("+1 year", strtotime($Startdate));

//convert it to the right format to insert into database
$start =date("Y-m-d",strtotime($Startdate));
$end=date("Y-m-d", $EndDate);

$newday = $start;



while($newday < $end){

        $insert = $pdo->prepare("INSERT INTO dates (date) VALUES ('$newday')");
        $insert->execute();

    echo 'date  inserted'.$newday.'<br>';
    $newday = date("Y-m-d", strtotime("+1 day", strtotime($newday)));
}

echo "<br><br><hr><br>all dates are inserted";
