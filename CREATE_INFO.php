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


$result = $pdo->query("CREATE TABLE IF NOT EXISTS info
                            (id_date INT(5)    NOT   NULL,
                              id_time INT(5)   NOT    NULL,
                              name    VARCHAR(50)  NULL,
                              phone   VARCHAR(20)  NULL,
                              notes   VARCHAR(200) NULL,
                              email   VARCHAR(50)  NULL,
                              ip      VARCHAR(50)  NULL)");
$result->execute();
$result->closeCursor();