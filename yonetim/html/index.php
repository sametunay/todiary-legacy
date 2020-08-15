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

$klasor= glob('../../uyeler/*');     
$klasorsayisi=count($klasor);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="../../images/yonetim-s.png" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Administrator</title>
</head>
<body>

<div>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">      
    <div class="col-md-6"><a class="navbar-brand" style="color:white;border-style:solid;border-width:1px;" href="#">&nbsp;Yönetim&nbsp;</a></div>
    <div class="col-md-6"><a class="navbar-brand-text" style="color:white;border-style:solid;border-width:1px;float:right;" href="logout.php">&nbsp;Çıkış&nbsp;</a></div>
  </nav>
</div>

<div class="container" style="margin-top:10px">
<table class="table table-striped table-light">
  
<thead class="thead-dark">
      <div style="width:100%;height:45px;background-color:#474747;margin-bottom:10px;">
      <center><h2 class="navbar-brand" style="color:white">ÜYELER</h2>
      </div>
       
      <tr>
      <th scope="col"></th>
      <th scope="col">Telefon</th>
      <th scope="col">Ad</th>
      <th scope="col">Soyad</th>
      <th scope="col">Cinsiyet</th>      
      <th scope="col">Günlük</th>      
      <th scope="col"></th>      
    </tr>
  </thead>

  <tbody>     
    <?php for($i=1;$i<=$klasorsayisi;$i++) { ?>   
                            
    <tr>
      <th scope="row"><?php echo $i;?></th>
      <td>
          <?php  
            $telefon=fopen($klasor[$i-1]."/telefon.txt","r");    
            $okutelefon[$i-1]=fgets($telefon);
            echo $okutelefon[$i-1];
            fclose($telefon);
          ?>
      </td>
      <td>
          <?php  
            $ad=fopen($klasor[$i-1]."/ad.txt","r");    
            $okuad[$i-1]=fgets($ad);
            echo $okuad[$i-1];
            fclose($ad);
          ?>
      </td>
      <td>
          <?php  
            $soyad=fopen($klasor[$i-1]."/soyad.txt","r");    
            $okusoyad[$i-1]=fgets($soyad);
            echo $okusoyad[$i-1];
            fclose($soyad);
          ?>
      </td>
      <td>
          <?php  
            $cinsiyet=fopen($klasor[$i-1]."/cinsiyet.txt","r");    
            $okucinsiyet[$i-1]=fgets($cinsiyet);
            echo $okucinsiyet[$i-1];
            fclose($cinsiyet);
          ?>
      </td>
      <td>
          <?php  
            $gunluk=glob($klasor[$i-1]."/gunlukler/*");    
            $sayisi=count($gunluk);
            echo $sayisi;
          ?>
      </td>
      <td>
          <form action="gunlukler.php" method="POST">              
              <input type="text" style="display:none;" name="tel" value="<?php echo $okutelefon[$i-1];?>">
              <input type="submit" value="Oku">
          </form>
      </td>

    </tr>
    <?php }?>
  </tbody>

</table>
</div>




</body>
</html>