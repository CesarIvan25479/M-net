<?php
session_start();
$zona = $_POST['zona'];
$clasificacion = $_POST['clasificacion'];
$_SESSION['zona'] =$zona ;
$_SESSION['clasificacion'] = $clasificacion ;
echo true;
?>