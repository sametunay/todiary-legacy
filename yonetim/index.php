<?php
ob_start();
session_start();
include '../baglanti.php';

function GetIP(){
    if(getenv("HTTP_CLIENT_IP")) {
         $ip = getenv("HTTP_CLIENT_IP");
     } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
         $ip = getenv("HTTP_X_FORWARDED_FOR");
         if (strstr($ip, ',')) {
             $tmp = explode (',', $ip);
             $ip = trim($tmp[0]);
         }
     } else {
     $ip = getenv("REMOTE_ADDR");
     }
    return $ip;
}
$ip_adresi = GetIP();
$_SESSION['ip']=$ip_adresi;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/yonetim.png" type="image/x-icon" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ip_adresi;?></title>
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="yonetim.php" method="POST">
                            <h3 class="text-center text-warning">Yönetim</h3>
                            
                            <div class="form-group">
                                <label for="tell" class="text-warning">Yonetici Kodu:</label><br>
                                <input type="text" name="y_kodu" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="sifree" class="text-warning">Şifre:</label><br>
                                <input type="password" name="sifre" id="password" class="form-control">
                                <p id="basarisiz" style="margin-top:5px;">
                                <font color="red">
                                <?php if(isset($_SESSION['durum1'])) echo $_SESSION['durum1'];?>
                                </font></p>
                            </div>
                            <div class="form-group">                                
                               <center> <input type="submit" name="submit" class="btn btn-warning btn-md" style="width:100%;color:white;" value="Giriş" style="width:auto;"></center><br>                              
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php unset($_SESSION['durum1']); ?>