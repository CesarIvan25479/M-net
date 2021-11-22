<?php
include 'Conexion.php';

$id=$_POST['id'];


	$sql="DELETE FROM pagosazteca WHERE id='$id'";
	echo $result=mysqli_query($Conexion,$sql);
?>