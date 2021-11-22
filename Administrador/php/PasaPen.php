<?php
include 'Conexion.php';

$id=$_POST['id'];


	$sql="UPDATE pagosazteca SET Estado = 'REGISTRADO' WHERE id='$id'";
	echo $result=mysqli_query($Conexion,$sql);
?>