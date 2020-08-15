<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kayıt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="icon" href="images/bgm.png" type="image/x-icon" />
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
      		<a class="navbar-brand" href="index.php">Günlük Sistemi</a>
   		 </div>    	
  </div>     
</nav>    

    <div class="container">
    <h1 class="well">Kayıt Formu</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="islem.php" method="POST" enctype="multipart/form-data" name="a1a1" onsubmit="return form_kontrol(this)">
					<div class="col-sm-12" name="kayitol">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label name="label" >Ad</label>
								<input type="text" name="ad" class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label name="label">Soyad</label>
								<input type="text" name="soyad" class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label name="label">Adres</label>
							<textarea rows="3" name="adres" class="form-control"></textarea>
						</div>	
													
                        <div class="md-form">
                        <label for="date-picker-example" name="label">Doğum Tarihi</label>
                        <input type="date" id="date-picker-example" name="d_tarihi" class="form-control datepicker">                        
                        </div><br>           
					<div class="form-group">
						<label name="label">Telefon</label>
						<input type="text" id="telefon" name="telefon" class="form-control">
					</div>		
					
					<!--CHECKLER-->
					<div class="form-group">
						<label id="evlitx">
                        <input type="checkbox" name="evli"  onclick="checkm(i=1)" id="evli" class="form-control-right">Evli</label>
                        <label id="bekartx">
						<input type="checkbox" name="bekar" onclick="checkm(i=2)" id="bekar" class="form-control-right">Bekar</label>
							
						<label id="erkektx">
						<input type="checkbox" name="erkek" onclick="checkc(y=1)" id="erkek" class="form-control-right" style="margin-left:70px">Erkek</label>
						<label id="kadintx">
						<input type="checkbox" name="kadin" onclick="checkc(y=2)" id="kadin" class="form-control-right">Kadın</label>
                    </div> 
					<!---->
                    
                    
                    <div class="form-group">
						<label name="label">Şifre</label>
                        <input type="password" name="sifre1" class="form-control">                        
					</div>
					<div class="form-group">
						<label name="label">Şifre Tekrar</label>
						<input type="password" name="sifre2" class="form-control"> 
						<div id="hata"></div>                       
					</div>
					
                    <div class="form-group" style="border-style:dark">
	    			<label id="phototx" name="phototxt">Resim</label>
	    			<input type="file" accept="image/*" name ="photo" id="photo">
	    			<p class="help-block" name="tekfoto">Lütfen tek fotoğraf yükleyin.</p>
					</div>
                    <br>
					<center><button type="submit" class="btn btn-lg btn-info">Kayıt Ol</button></center>				
            </div>  
				</form> 
				</div>
	</div>
	</div>





	
</body>
</html>