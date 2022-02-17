<?php
session_start();
$rangoFecha = $_POST['rangoFecha'];
$filtroTipo = $_POST['filtroTipo'];
$filtroIns = $_POST['filtroIns'];
$rangoFecha = explode(" - ",$rangoFecha);
$fechaIni = explode("/",$rangoFecha[0]);
$fechaFin = explode("/",$rangoFecha[1]);

$fechaIni = $fechaIni[2].$fechaIni[0].$fechaIni[1];
$fechaFin = $fechaFin[2].$fechaFin[0].$fechaFin[1];

if ($fechaIni != "" || $fechaFin !=""){
    $_SESSION["finior"] = $fechaIni;
    $_SESSION["ffinor"] = $fechaFin;
    $_SESSION["Filorti"] = $filtroTipo;
    $_SESSION["Filorin"] = $filtroIns;
    echo true;
}
?>