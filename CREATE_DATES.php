<?php
$dsn = "mysql:host=localhost;dbname=Calendar_App;charset=utf8mb4";
$user = 'user';
$pass = 'toor';
$pdo = new PDO($dsn, $user, $pass);

$result = $pdo->prepare("CREATE TABLE IF NOT EXISTS dates (id INT(5) NOT NULL AUTO_INCREMENT, date DATE ,  PRIMARY KEY (id), UNIQUE KEY (id))");
$result->execute();
$result->closeCursor();

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
