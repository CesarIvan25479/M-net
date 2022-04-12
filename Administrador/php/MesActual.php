<?php 
setlocale(LC_TIME, "spanish");
$MesActual = strftime('%b %Y');
$MesActual = str_replace('.','',$MesActual);
$MesActual = strtoupper($MesActual);
?>