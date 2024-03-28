<!-- Author: Nicole Edoziem-->


<?php
$servername = "localhost"; // or your host
$username = "root"; // your database username
$password = ""; // your database password
$dbname   = "EventiqueHarmony"; // your database name

$connection = mysqli_connect($servername, $username, $password, $dbname);
if(!$connection)
    die("couldn't connect".mysqli_connect_error());
else

     echo 'connection established';
?>
