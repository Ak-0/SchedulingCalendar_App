<?php
/**
 * Created by PhpStorm.
 * User: Ark
 * Date: 2018-02-25
 * Time: 12:07 AM
 */
$dsn = "mysql:host=localhost;dbname=Calendar_App;charset=utf8mb4";
$user = 'user';
$pass = 'toor';
$pdo = new PDO($dsn, $user, $pass);
$table="dates";

//get startdate and enddate,
// as startdate we will use 2007-12-31,
// because in the while loop we add to $newday +1day, so our first value will be //2008-01-01.
// +365 for 1 year

$Startdate="2018-3-01";
$EndDate =mktime(0,0,0,date("m"),date("d")+365,date("Y"));

//convert it to the right format to insert into database
$start =date("Y-m-d",strtotime($Startdate));
$end=date("Y-m-d", $EndDate);

//Now we will create a loop to get all days whereby the variable $newday is being used.
// we assign to $id the value 1 for the first row.
$newday= $start;
$id="1";
while($newday < $end){

        $result = $pdo->query("UPDATE $table SET date = '$newday' WHERE id = $id ");
        $result->execute();

    echo 'date '.$id.' inserted';
    $newday = date("Y-m-d", strtotime("+1 day", strtotime($newday)));
    $id++;
}



//display message
echo "all dates are inserted";
?>