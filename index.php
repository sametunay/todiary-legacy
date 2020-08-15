<?php
session_start();
if (isset($_SESSION['giris']))
{
    header("Location:html/index.php");
} 

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/bgm.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Günlük Giriş</title>
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="login.php" method="POST">
                            <h3 class="text-center text-info">Günlük Sistemi</h3>
                            
                            <div class="form-group">
                                <label for="tell" class="text-info">Telefon:</label><br>
                                <input type="text" name="tel" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="sifree" class="text-info">Şifre:</label><br>
                                <input type="password" name="sifre" id="password" class="form-control">
                                <p id="basarisiz" style="margin-top:5px;"><font color="red"><?php if(isset($_SESSION['durum'])){ echo $_SESSION['durum'];}?></font></p>
                            </div>
                            <div class="form-group">                                
                               <center> <input type="submit" name="submit" class="btn btn-info btn-md" style="width:100%" value="Giriş" style="width:auto;"></center><br>                              
                            </div>                            
                        </form>

                        <button type="button" onclick="window.location='kayit.php'" class="btn btn-outline-info" style="float:right;">Kayıt Ol</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>