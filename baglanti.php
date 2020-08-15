<?php
$host="localhost:3308"; //your host (3308 = mysql port)
$user="root";   //your database username
$pass="";   //your database password
$db="db";   //your database name
$baglan=mysqli_connect($host,$user,$pass,$db);

if($baglan){}   
else
{
    die("baglantı basarısız"); // connection failed
}

?>
