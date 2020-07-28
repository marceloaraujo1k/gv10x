<?php

include '../opendb.php';
include_once('../func.php');
	
	
$form = $_POST;	 
	

if (empty ($form["id"])){	
	$query	= "INSERT INTO grupocliente (idGrupoCliente,
	descricaoGrupoCliente, observacaoGrupoCliente)
	VALUES
	(null,
	'$form[descricaoGrupoCliente]',
	'$form[observacaoGrupoCliente]'
	)";

	mysqli_query($mysql_conn,$query);
    header ('location: grupoClientes.php');
}

else {
	if(!empty($form["id"])) {
	$query	= "UPDATE grupocliente SET 
	descricaoGrupoCliente='$form[descricaoGrupoCliente]',
	observacaoGrupoCliente='$form[observacaoGrupoCliente]'
	WHERE idGrupoCliente='$form[id]'";	
	mysqli_query($mysql_conn,$query);
	header ('location: grupoClientes.php');
	}
}	
	
?>