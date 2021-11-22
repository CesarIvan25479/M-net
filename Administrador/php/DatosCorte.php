<?php
session_start();

$id=$_POST['id'];
$_SESSION['idrouter'] = $id;
	
if($_SESSION['idrouter'] != ''){
    echo true;  
}
    
	
?>