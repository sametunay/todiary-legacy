<?php
ob_start();
session_start();  
   
$tel = $_POST['tel'];
$sifre=$_POST['sifre'];   

setcookie("login","true",time()+2400);

function basarisiz(){
    $_SESSION['durum']="Telefon Numarası veya Şifre Hatalı..";
    header("Location:index.php");
    exit("dosya açılamadı !");
}

$telefon=fopen("uyeler/".$tel."/telefon.txt","r") or basarisiz();   
$sifredosya=fopen("uyeler/".$tel."/sifre.txt","r") or basarisiz();   
while(!feof($telefon))
{
    $satir=fgets($telefon);
    if($satir==$tel)
    {
        $t=1;             
    }
    else {
        $t=0;
    }   
}
while(!feof($sifredosya))
{
    $satir=fgets($sifredosya);
    if($satir==$sifre)
    {
        $s=1;    
    }
    else{
        $s=0;
    }   
}
fclose($sifredosya);
fclose($telefon);

if ($t==1 && $s==1)
{
    echo "<script>alert('BASARILI');</script>";
    $_SESSION['telefon']=$tel;
    $_SESSION['password']=$sifre;
    $_SESSION['giris']="true";        
    
    $ad=fopen("uyeler/".$tel."/ad.txt","r");
    $okuad=fgets($ad);
    $_SESSION['ad']=$okuad;
    fclose($ad);

    $soyad=fopen("uyeler/".$tel."/soyad.txt","r");
    $okusoyad=fgets($soyad);
    $_SESSION['soyad']=$okusoyad;
    fclose($soyad);

    $d_tarihi=fopen("uyeler/".$tel."/d_tarihi.txt","r");
    $okudt=fgets($d_tarihi);
    $_SESSION['d_tarihi']=date("d/m/Y",strtotime($okudt));    
    fclose($d_tarihi);

    $resim="uyeler/".$tel."/resimyolu.txt";
    if(file_exists($resim))
    {
    $r_yolu=fopen("uyeler/".$tel."/resimyolu.txt","r");
    $okuresim=fgets($r_yolu);
    $_SESSION['resim']=$okuresim;
    fclose($r_yolu);
    }else
    {
        $_SESSION['resim']="default.png";
    }
    header("Location:html/index.php");
}
    else {
    basarisiz();
}

?>