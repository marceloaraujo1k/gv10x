<?php

include '../opendb.php';
include_once('../func.php');
	
	
$form = $_POST;	 
	

if (empty ($form["id"])){	
	$query	= "INSERT INTO categorias (idCategoria,
	descricao)
	VALUES
	(null,
	'$form[descricao]')";

	mysqli_query($mysql_conn,$query);
    header ('location: categorias.php');
}

else {
	if(!empty($form["id"])) {
		print_r($form);
	$query	= "UPDATE categorias SET 
	descricao='$form[descricao]'
	WHERE idCategoria='$form[id]'";	
	mysqli_query($mysql_conn,$query);
	header('location: categorias.php' );
	}
}	
	
?>