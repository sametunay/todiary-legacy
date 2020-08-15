<?php
ob_start();
session_start();
$ad        =  $_POST['ad'];
$soyad      = $_POST['soyad'];
$adres      = $_POST['adres'];
$d_tarihi   = $_POST['d_tarihi'];
$telefon    = $_POST['telefon'];
$tarih      = date("d").date("m").date("Y").date("H").date("i").date("s");
if(isset($_POST['erkek'])){$cinsiyet='erkek';}else{$cinsiyet='kadin';}
if(isset($_POST['evli' ])){$m_durum  ='evli';}else{$m_durum='bekar';}
$sifre      = $_POST['sifre1'];
$yol="uyeler/".$telefon;
if (file_exists($yol))
{
    echo "<script>alert('Böyle bir üye zaten var !');</script>";
    header("Refresh:1;url=kayit.php");
}
else
{

        if (isset($_FILES['photo']) && $_FILES['photo']['size']>0)
        {
            $hata=$_FILES['photo']['error'];
            if($hata!=0)   
            {   
                    echo "<script>alert('Resim yüklenirken bir hata ile karşılaşıldı !');</script>";
                    header("Refresh:1;url=kayit.php");
            }   
            else    
            {   
                    $boyut=$_FILES['photo']['size'];
                    if($boyut>1024*1024*3)
                        {
                        echo "<script>alert('Dosya boyutu 3MB den büyük olamaz !');</script>";
                        header("Refresh:1;url=kayit.php");
                        }
                    else
                    {    
                        $r_tip=$_FILES['photo']['type'];
                        $r_ad=$_FILES['photo']['name'];
                        $r_uzanti=explode('.',$r_ad);
                        $r_uzanti=$r_uzanti[count($r_uzanti)-1];      
                                if($r_uzanti !='jpeg' && $r_uzanti !='png' && $r_uzanti !='jpg')
                                {
                                    echo "<script>alert('Yalnızca JPG,JPEG,PNG türünde dosyaları yükleyebilirsiniz !');</script>";
                                    header("Refresh:1;url=kayit.php");
                                }
                                else
                                {
                                    if(!($boyut==0))
                                    {
                                    mkdir("uyeler/".$telefon."");                
                                    $yol="uyeler/".$telefon.'/';                                        
                                    $resim=$_FILES['photo']['tmp_name'];
                                    $new_name=$tarih.$ad.$soyad.$telefon;
                                    copy($resim,$yol.$r_ad);
                                    $isimsonuc=rename(  $yol.$r_ad   ,    $yol.$new_name.'.'.$r_uzanti  ); 
                                    $resimyolu='uyeler/'.$telefon.'/'.$new_name.'.'.$r_uzanti; 
                                    $resimyolutxt = fopen("".$yol."resimyolu.txt", "w") or die("Dosya Bulunamadı !");
                                    $txt = "../".$resimyolu;
                                    fwrite($resimyolutxt, $txt);
                                    fclose($resimyolutxt); 
                                    }             
                                }
                    }
            }         
        }    
        if(!file_exists("uyeler/".$telefon))
        {
        mkdir("uyeler/".$telefon."/");
        }
        $yol="uyeler/".$telefon.'/';
        mkdir($yol."gunlukler");
        $telefontxt = fopen("".$yol."telefon.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $telefon;
        fwrite($telefontxt, $txt);
        fclose($telefontxt);    

        $sifretxt = fopen("".$yol."sifre.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $sifre;
        fwrite($sifretxt, $txt);
        fclose($sifretxt); 

        $adrestxt = fopen("".$yol."adres.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $adres;
        fwrite($adrestxt, $txt);
        fclose($adrestxt); 

        $adtxt = fopen("".$yol."ad.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $ad;
        fwrite($adtxt, $txt);
        fclose($adtxt); 

        $soyadtxt = fopen("".$yol."soyad.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $soyad;
        fwrite($soyadtxt, $txt);
        fclose($soyadtxt); 

        $cinsiyettxt = fopen("".$yol."cinsiyet.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $cinsiyet;
        fwrite($cinsiyettxt, $txt);
        fclose($cinsiyettxt); 

        $m_durumtxt = fopen("".$yol."m_durum.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $m_durum;
        fwrite($m_durumtxt, $txt);
        fclose($m_durumtxt); 

        $d_tarihitxt = fopen("".$yol."d_tarihi.txt", "w") or die("Dosya Bulunamadı !");
        $txt = $d_tarihi;
        fwrite($d_tarihitxt, $txt);
        fclose($d_tarihitxt);


        echo "<script>alert('Kayıt başarı ile tamamlandı !');</script>";
        header("Refresh:2;url=index.php");

}
?>