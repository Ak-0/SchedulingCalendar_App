<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 2/25/18
 * Time: 11:29 PM

 */

require_once ('PDO_link.php');



$result = $pdo->query("CREATE TABLE IF NOT EXISTS  info
                                (
                                    id_date int(5) not null,
                                    id_time int(5) not null,
                                    name varchar(50) null,
                                    phone varchar(20) null,
                                    notes varchar(200) null,
                                    email varchar(50) null,
                                    ip varchar(50) null,
                                    done tinyint(1) null,
                                    event_date varchar(20) null
                                )");
$result->execute();
$result->closeCursor();

;

