<?php
session_start();
if($_SESSION['giris'] <>"true")
{
    header("Location:../");
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="icon" href="../images/bgm.png" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="fonksiyonlar.js"></script>
    <script>$('.datepicker').pickadate();</script>
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
<script>
	function form_kontrol(form_)
	{
		var inputisim= [form_.baslik,	form_.g_tarih,	form_.gunluk];
		var label 	= document.getElementsByName("label");

		for(i=0;i<=2;i++)
		{
				if(inputisim[i].value=="" || inputisim[i].value==null)
				{			
					inputisim[i].focus();
					label[i].style.color = "red";
					return false;	
				}
				else
				{
					label[i].style.color = "black";		
				}		
		}
		return true; 
		
	}


</script>


<div class="container">    
	<div class="col-lg-12 well" style="margin-top:30px">
	    <div class="row">
	    			<form action="g_islem.php" method="POST" enctype="multipart/form-data" onsubmit="return form_kontrol(this)">
	    				<div class="col-sm-12" name="kayitol">
	    					<div class="row">
	    						    <div class="col-sm-6 form-group">
	    						    	<label name="label" >Başlık</label>
	    						    	<input type="text" name="baslik" class="form-control">
	    						    </div>
	    						    <div class="col-sm-6 form-group">
                                    <label for="date-picker-example" name="label">Tarih</label>
                                    <input type="date" id="date-picker-example" name="g_tarih" class="form-control datepicker"> 
	    						    </div>
	    					</div>	
	    					<div class="form-group">
	    						<label name="label">Günlük</label>
	    						<textarea rows="14" name="gunluk" class="form-control"></textarea>
	    					</div>														
				   <center><button type="submit" class="btn btn-lg btn-success">Ekle</button>
				</form> 
			</div>	
				   	               
	      						
					
									
        </div>         
	</div>			
</div>				
	
	

</body>
</html>

<?php



?>