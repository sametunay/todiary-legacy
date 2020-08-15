<?php
ob_start();
include '../../baglanti.php';

function GetIP(){
    if(getenv("HTTP_CLIENT_IP")) {
         $ip = getenv("HTTP_CLIENT_IP");
     } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
         $ip = getenv("HTTP_X_FORWARDED_FOR");
         if (strstr($ip, ',')) {
             $tmp = explode (',', $ip);
             $ip = trim($tmp[0]);
         }
     } else {
     $ip = getenv("REMOTE_ADDR");
     }
    return $ip;
}
$ip_adresi = GetIP();

$sorgu="INSERT INTO yetkili_ip VALUES ('".$ip_adresi."')";
$islem=mysqli_query($baglan,$sorgu);

if($islem)
{
    echo "<h1>BAŞARI</h1>";
    header('Refresh:1; url=../');
}
else
{
    echo "<h1>BAŞARISIZ</h1>";
    header('Refresh:1; url=../');
}
ob_flush();
?>
