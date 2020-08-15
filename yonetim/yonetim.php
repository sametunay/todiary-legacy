<?php
ob_start();
session_start();
include '../baglanti.php';

$k_adi=$_POST['y_kodu'];
$y_sifre=$_POST['sifre'];

$sorgu="SELECT * FROM giris WHERE k_adi='".$k_adi."' AND sifre='".$y_sifre."' ";
$sorgu_kontrol=mysqli_query($baglan,$sorgu);

$ip_sorgu=mysqli_query($baglan,'SELECT * FROM yetkili_ip');
$result=false;

if (mysqli_num_rows($sorgu_kontrol))
    {
        while($sonuc=mysqli_fetch_array($ip_sorgu))
        {
            if($_SESSION['ip']==$sonuc['ip'])
            {
                $result=true;
                echo "<script>alert('Yetkili ip adresi ile giriş yapıldı !');</script>";
                $_SESSION['yonetici']="true";
                header("Refresh:0; url=html");
            }
        }  
        
        if($result==false)
        {
            echo "<script>alert('Yetkisiz IP Adresi !');</script>";
            header('Refresh:0; url=index.php');
        }   
        
    }
else
    {
        $_SESSION['durum1']="Kullanıcı adı veya Şifre hatalı !";
        header("Location:index.php");
    }






?>