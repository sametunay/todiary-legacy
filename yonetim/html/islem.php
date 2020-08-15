<?php
ob_start();
session_start();
$telefon=$_SESSION['tel'];

if(isset($_POST['sil']))
{
    $dosya_adi=$_POST['sil'];
}
if(isset($_POST['gizle']))
{
    $dosya_adi=$_POST['gizle'];
}


if (isset($_POST['sil']))
{   
   
    unlink($_POST['sil']."/baslik.txt");
    unlink($_POST['sil']."/g_tarih.txt");
    unlink($_POST['sil']."/gunluk.txt");
    rmdir($dosya_adi);
    header("Location:index.php");
    die();
}

if (isset($_POST['gizle']))
{      
    rename($dosya_adi,"../../arsiv/".$telefon.basename($dosya_adi));
    header("Location:index.php");
    die();
}

?>

