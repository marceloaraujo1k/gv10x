<?php

include '../opendb.php';
include_once('../func.php');
	
	
$form = $_POST;	 

if (empty ($form["id"])){	
	$query	= "INSERT IGNORE INTO carteiras (idCarteira,
	idColaborador, idCliente)
	VALUES
	(NULL, '$form[idColaborador]', '$form[idCliente]')";
	mysqli_query($mysql_conn,$query);
	header ('location: cadastroColaboradores.php?id='.$form['idColaborador']);
}

else {
	if(!empty($form["id"])) {
	$query	= "UPDATE carteiras SET
	idColaborador='$form[idColaboradorMigracao]'
	WHERE idCarteira='$form[id]'";	
	mysqli_query($mysql_conn,$query);
	header ('location: cadastroColaboradores.php?id='.$form['idColaborador']);
}

} 	
	
?>