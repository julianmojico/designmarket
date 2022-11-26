<?php
session_start();
$sqlConnect = mysqli_connect("localhost","root","","agency") or die ("No es posible conectarse a la db");
if ($sqlConnect -> connect_errno) {
    echo "Failed to connect to MySQL: " . $sqlConnect -> connect_error;
    exit();
  }
mysqli_set_charset($sqlConnect, 'utf8'); 
?>