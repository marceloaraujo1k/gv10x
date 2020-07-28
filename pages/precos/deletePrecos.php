<?php

include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];

	//Excluir imagem
	$query	= "SELECT foto FROM  precos WHERE idPreco='$id'";
	$result = mysqli_query($mysql_conn,$query);
	$row = mysqli_fetch_array($result);
	unlink($row['foto']);
	
	//Excluir registro
   mysqli_query($mysql_conn, "DELETE FROM precos WHERE idPreco='$id'");
   header ('location: precos.php');
?>