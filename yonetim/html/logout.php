<?php
ob_start();
session_start();
session_destroy();
ob_clean();
header("Location:../");
ob_end_flush();



?>