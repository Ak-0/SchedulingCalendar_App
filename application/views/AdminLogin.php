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
    <title>GlobalRose Support  Scheduling</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="application/javascript"></script>

    <link rel="stylesheet" href="<?php echo base_url().'css/style.css'?>">

</head>
<body>

<div id="container">
    <h1><img src="<?php echo base_url().'/imgs/logo-globalrose-tm.png'?>"></h1>
    <div id="body">
<table>
            <form action="/auth" method="post">
        <tr>       <td>User:</td><td> <input type="text" required name="user" class="form-item"></input>
            </td></tr><tr>      <td>Password:</td><td>  <input type="password" required name="pass" class="form-item"></input>
                    </td></tr></table>
                <input class="form-item" type="submit" value="Login">
            </form>

    </div>

</div>

</body>
</html>