<?php
ob_start();
session_start();

if(isset($_SESSION['yonetici']))
{
    $_SESSION['yonetici']=="true";
}
else
{
    header("Location:../");
}


$tel=$_POST['tel'];
$_SESSION['tel']=$tel;
$klasor=glob("../../uyeler/".$tel."/gunlukler/*");

$klasorsayisi=count($klasor);

    for($i=0;$i<$klasorsayisi;$i++)
    {
         $yol3=fopen($klasor[$i].'/baslik.txt','r');             
          $okubaslik[$i]=fgets($yol3);          
          fclose($yol3);

          $yol3=fopen($klasor[$i].'/gunluk.txt','r');             
           $okugunluk[$i]=fgets($yol3);           
           fclose($yol3);

          $yol3=fopen($klasor[$i].'/g_tarih.txt','r');             
           $okutarih[$i]=fgets($yol3);           
           fclose($yol3);          
    }

           $yol3=fopen('../../uyeler/'.$tel.'/ad.txt','r');             
           $ad=fgets($yol3);           
           fclose($yol3);

           $yol3=fopen('../../uyeler/'.$tel.'/soyad.txt','r');             
           $soyad=fgets($yol3);           
           fclose($yol3);
           

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../images/yonetim-s.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Günlükler</title>      
</head>

<body>    
<div style="margin-bottom:30px">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">      
    <div class="col-md-4"><a class="navbar-brand" style="color:white;border-style:solid;border-width:1px;" href="index.php">&nbsp;<&nbsp;</a></div>
    <div class="col-md-4"><h4 style="color:white;"><center>&nbsp;Günlükler&nbsp;</center></h4></div>
    <div class="col-md-4"><a class="navbar-brand" style="color:white;border-style:solid;border-width:1px;float:right;" href="logout.php">&nbsp;Çıkış&nbsp;</a></div>
  </nav>
</div>

    <div class="container"> 
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                  <th style="width:25%"><center><span><?php echo $tel;?></span></th>      
                  <th style="width:25%"><center><span><?php echo $ad;?></span></th>      
                  <th style="width:25%"><center><span><?php echo $soyad;?></span></th>      
                  <th style="width:25%"><center><span><?php echo 'Toplam : '.$klasorsayisi;?></span></th>      
                </tr>
            </thead>
        </table>        
    </div>
    

<?php for($i=0;$i<$klasorsayisi;$i++) { ?>

<div class="container">           
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th colspan="4"><center><h3><?php echo $okubaslik[$i];?></h3></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="4"><center><?php echo $okugunluk[$i];?></td>      
    </tr>    
    <tr><form action="islem.php" method="POST">
        <td colspan="2"><center><button type="submit" onclick="return window.confirm('Silmek istediğinize eminmisiniz?');" name="sil" value="<?php echo $klasor[$i];?>" type="button" class="btn btn-outline-danger btn-sm">Sil</button></td>
        <td colspan="2"><center><button type="submit" onclick="return window.confirm('Gizlemek istediğinize eminmisiniz?');" name="gizle" value="<?php echo $klasor[$i];?>"type="button" class="btn btn-outline-light btn-sm">Gizle</button></td>          
    </tr></form>
    <tr>
      <td colspan="4"><center><?php echo $okutarih[$i];?></td>  
    </tr>
  </tbody>
</table>
</div>

<?php } ?>  

</body>
</html>        