<?php
session_start();
$clave = $_POST["clave"];
$_SESSION['clave'] = $clave;
echo true;
?>