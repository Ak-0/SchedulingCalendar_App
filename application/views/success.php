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
    <h1>GlobalRose - Support Scheduling </h1>
    <div id="body">
        <table>
            <thead class="success-heading"><td>
            Successfully submitted the request for support.
            </td>
            </thead>
        </table>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>