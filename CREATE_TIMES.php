<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:29 PM

 */

$dsn = "mysql:host=localhost;dbname=Calendar_App;charset=utf8mb4";
$user = 'user';
$pass = 'toor';
$pdo = new PDO($dsn, $user, $pass);

$date = new DateTime('2018-03-01 8:30:00');
$count = 9 * 60 / 30;
$arr = [];


$result = $pdo->query("CREATE TABLE IF NOT EXISTS times (id INT(5) NOT NULL AUTO_INCREMENT, time TIME ,  PRIMARY KEY (id), UNIQUE KEY (id))");
$result->execute();
$result->closeCursor();
/** @var int $i */
for($i=0; $i<$count; $i++) {
    echo 'Time '.$i.': '.$arr[$i].'Being Inserted..<br>';
    $arr[$i] = $date->add(new DateInterval("P0Y0DT0H30M"))->format('h:i');
    $insert = $pdo->prepare("INSERT INTO times 
                                    (time) 
                                    VALUES ('$arr[$i]');
                                    ");

    $insert->execute();
}echo ('<br><br><hr><br>all times inserted.');
