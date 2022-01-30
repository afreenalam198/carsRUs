<?php
function OpenCon()
 {
    $dbhost = "sql200.epizy.com";
    $dbuser = "epiz_30946368";
    $dbpass = "w0bWezgohKzMY";
    $db = "epiz_30946368_carsrus";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connection Failed: %s\n". $conn -> error);
 
 return $conn;
 }
 function CloseCon($conn)
 {
 $conn -> close();
 }

 
/*
 
$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "carsrus";
*/ 
?>

