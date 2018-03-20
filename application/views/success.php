<?php
/**
 * Created by PhpStorm.
 * User: ak
 * Date: 3/3/18
 * Time: 6:57 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="application/javascript"></script>

    <link rel="stylesheet" href="<?php echo base_url().'css/style.css'?>">

</head>
<body>

<div id="container">
    <h1><a href="/"><img src="<?php echo base_url().'/imgs/logo-globalrose-tm.png'?>"></a></h1>
    <div id="body">
        <h1>Thank you, for Successfully submitting the following request for support.</h1>
        <center><h2>
            ATTENTION:  Please take a note of the following time and day for your appointment!
        </h2>
        <table>

                    <?php echo '<tr><td>Day of appointment: </td><td>'.$day .

                                '</td></tr><tr><td>Time of Appointment:</td><td>'. $time .
                                '</td></tr><tr><td>Your Event Date:</td><td>' . $event_date .'</td></tr>'; ?>


        </table>
        </center>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>