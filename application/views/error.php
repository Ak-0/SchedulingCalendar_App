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
    <script>
        $( document ).ready(function() {
            console.log( "success loaded" );


        });
    </script>
    <style type="text/css">

        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }

        body {
            background-color: gainsboro;
            margin: 10px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 0px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            background-color: whitesmoke;
            margin: 0 10px 0 10px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
            background-color: whitesmoke;
        }

        table, td{
            border: 1px solid black;
            border-style: groove;
            border-radius: 4.2px;
            min-width:50px;
            padding: 4px;
            height:50px;
        }
        #times table td{
            padding:0px;
            height: 30px;
            min-width: 30px;
            border-radius: 0px;
        }
        tr td:hover, .selected{
            background-color: darkgray;
            cursor: pointer;
            text-decoration: underline;
            color: #0d6aad;

        }
        .disabled, .disabled:hover{
            background-color: lightgray;
            cursor: not-allowed !important;
            color: unset;
            text-decoration: unset;
        }
        #info-area{
            float:right;
            position: absolute;
            top: 70px;
            left: 40%;
        }

        @media screen and (max-width: 1250px){
            #info-area{
                position: unset !important;
                float:unset !important;
                top: unset !important;
                left:unset !important;
            }

        }
        thead td:hover{
            background-color: transparent;
            text-decoration: unset;
            color: unset;
        }
        .form-item{
            padding:10px;
            background-color: whitesmoke;
            color: #474747;
            border: 1px solid lightgray;
            border-radius: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>GlobalRose - Support Scheduling </h1>
    <div id="body">
        <table>
            <thead class="success-heading"><td>
                ERROR: Could not submit the request for support.<br>
                Please go back and select a valid time.
            </td>
            </thead>
        </table>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>