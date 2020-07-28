<?php

include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];

	//Excluir imagem
	$query	= "SELECT foto FROM  produtos WHERE idProduto='$id'";
	$result = mysqli_query($mysql_conn,$query);
	$row = mysqli_fetch_array($result);
	unlink($row['foto']);
	
	//Excluir registro
   mysqli_query($mysql_conn, "DELETE FROM produtos WHERE idProduto='$id'");
   header ('location: produtos.php');
?>