<?php
ob_start();
session_start();

if($_SESSION['giris'] <>"true")
{
    header("Location:../");
    session_destroy();
}
$telefon = $_SESSION['telefon'];

if (isset($_POST['sil']))
{   
   
    unlink("../uyeler/".$telefon."/gunlukler"."/".$_POST['sil']."/baslik.txt");
    unlink("../uyeler/".$telefon."/gunlukler"."/".$_POST['sil']."/g_tarih.txt");
    unlink("../uyeler/".$telefon."/gunlukler"."/".$_POST['sil']."/gunluk.txt");
    rmdir("../uyeler/".$telefon."/gunlukler"."/".$_POST['sil']);
    header("Location:../html/index.php");
    die();
}

$baslik=$_POST['baslik'];
$g_tarih=$_POST['g_tarih'];
$gunluk=$_POST['gunluk'];


$yol="../uyeler/".$telefon."/"."gunlukler/".$g_tarih."/";

    if (file_exists($yol))
    {
        mkdir("../uyeler/".$telefon."/"."gunlukler/".$g_tarih."(1)");
         $yol="../uyeler/".$telefon."/"."gunlukler/".$g_tarih."(1)/";
    }
    else
    {
    if (!file_exists($yol))    
    mkdir("../uyeler/".$telefon."/"."gunlukler/".$g_tarih."");
    }


$f_baslik=fopen("".$yol."baslik.txt", "w") or die("Dosya Bulunamadı !");
$f_tarih =fopen("".$yol."g_tarih.txt", "w") or die("Dosya Bulunamadı !");
$f_gunluk=fopen("".$yol."gunluk.txt", "w") or die("Dosya Bulunamadı !");

$f_baslik_text = $baslik;
$f_tarih_text  = $g_tarih;
$f_gunluk_text = $gunluk;

fwrite($f_baslik, $f_baslik_text);
fwrite($f_tarih, $f_tarih_text);
fwrite($f_gunluk, $f_gunluk_text);

fclose($f_baslik);
fclose($f_tarih);
fclose($f_gunluk); 

header("Refresh:1;url=index.php");
echo "<script>alert('Günlük Başarı ile eklendi !');</script>";
die();
?>