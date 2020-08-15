<?php
session_start();
if($_SESSION['giris'] <>"true")
{
    header("Location:../");
    session_destroy();
} 
if(!isset($_COOKIE['login']))
{
    echo "<script>alert('Oturumunuz zaman aşımına uğradı !');</script>";
    header("Refresh:1;url=../");
    session_destroy();
}

    $gunlukdizin="../uyeler/".$_SESSION['telefon']."/gunlukler";    
    $klasor= glob($gunlukdizin.'/*');   
    rsort($klasor);    
    $klasorsayisi=count($klasor);  
    for($i=0;$i<$klasorsayisi;$i++){$gunluktx[$i]='';} 


    for($i=0;$i<$klasorsayisi;$i++)
    {   

            $baslik=fopen($klasor[$i]."/baslik.txt","r");    
            $okubaslik[$i]=fgets($baslik);
            fclose($baslik);

            $tarih=fopen($klasor[$i]."/g_tarih.txt","r");
            $okutarih[$i]=fgets($tarih);
            $okutarih[$i]=date("d/m/Y",strtotime($okutarih[$i]));
            fclose($tarih);

            $gunluk=fopen($klasor[$i]."/gunluk.txt","r");
              while(!(feof($gunluk)))
               {         
              $okugunluk[$i]=fgets($gunluk);             
              $gunluktx[$i]=$gunluktx[$i].$okugunluk[$i].'<br>';                            
               }
            fclose($gunluk);               

    }       
  

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo strtoupper($_SESSION['ad']);?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/bgm.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../fonksiyonlar.js"></script>

</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../html/">Günlük Sistemi</a>
    </div>
    <ul class="nav navbar-nav">      
      <li><a href="../html/">Günlüğüm</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> 
      <?php 
      echo strtoupper($_SESSION['ad']);         
      
      ?></a>

      <ul class="dropdown-menu">                  
          
          <div class="well">
          <center> 
          <div style="width:70px;height:140px;"><img src="<?php echo $_SESSION['resim'];?>" style="width:100%;height:100%;" class="img-rounded"></div>
          <h3><?php echo strtoupper($_SESSION['ad']." ".$_SESSION['soyad']);?></h3>
           <p><?php echo $_SESSION['d_tarihi'];?></p>
           <p>GSM:<?php echo $_SESSION['telefon']; ?>
	      	</center>
        </div>    
        </ul>
        
    </li>

      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Çıkış</a></li>
    </ul>
  </div>
</nav>

    <div class="container">
    <h3>Hoşgeldin <?php echo strtoupper($_SESSION['ad'])." ".strtoupper($_SESSION['soyad']);?></h3>
    <p>Doğru yerdesin..</p>
    </div>                     
   
  <div>  
    <center><img src="add.png" style="width:50px;height:auto; margin-bottom:40px;cursor:pointer;" onclick="window.location='gunluekle.php'" ><center>
  </div>
    
      
  <?php for($i=0;$i<$klasorsayisi;$i++) { ?>

  <div class="container" style="border-style:groove;margin-bottom:20px">                                                                                   
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th><?php echo $okubaslik[$i];?></th> <!--baslık-->
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="margin-top:10px"><?php echo $gunluktx[$i];?></td> <!--gunluk-->       
      </tr>
    </tbody>
  </table>
            <div>
              <form action="g_islem.php" method="POST">
            <button onclick="return window.confirm('Silmek istediğinize eminmisiniz?');" type="submit" name="sil" value="<?php echo $okutarih[$i];?>" class="btn btn-danger" style="margin-bottom:10px;background-color: #c20404;">Sil</button>         
              <p style="float:right;font-weight:bold;"><?php echo $okutarih[$i];?></p> <!--tarih-->                
           </form> 
          </div>
  </div>
</div>

     <?php } ?>          

  






     
</body>
</html>


