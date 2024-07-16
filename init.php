
<?php
date_default_timezone_set('Asia/Kolkata');
$servername = "localhost";
$username = "midbrkhy_gitar";
$password = "midbrkhy_gitar";
$db = "midbrkhy_gitar";

$con = mysqli_connect($servername, $username, $password,$db);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$web_add = "https://gitar.mid-demo.co.in/";


$order_inc = "#CT230";


?>