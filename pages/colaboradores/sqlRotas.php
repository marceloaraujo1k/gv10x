<?php

include '../opendb.php';
include_once('../func.php');
	
	
$form = $_POST;	 

if (empty ($form["id"])){	
	$query	= "INSERT INTO rotas (idRota, idColaborador, idGrupoCliente, 
	descricaoRota, dataHoraInicioRota, dataHoraFimRota, prazoRota, observacaoRota)
	VALUES
	(NULL, '$form[idColaborador]', '$form[idGrupoCliente]',
	 '$form[descricaoRota]', '$form[dataHoraInicioRota]', '$form[dataHoraFimRota]', '$form[prazoRota]',
	'$form[observacaoRota]')";
	mysqli_query($mysql_conn,$query);
	print_r($query);
	header ('location: cadastroColaboradores.php?id='.$form['idColaborador']);
}

else {
	if(!empty($form["id"])) {
	$query	= "UPDATE rotas SET
	idColaborador='$form[idColaborador]', 
	idGrupoCliente='$form[idGrupoCliente]',
	descricaoRota='$form[descricaoRota]',
	dataHoraInicioRota='$form[dataHoraInicioRota]',
	dataHoraFimRota='$form[dataHoraFimRota]',
	prazoRota='$form[prazoRota]',
	observacaoRota='$form[observacaoRota]')	
	WHERE idRotas='$form[id]'";	
	mysqli_query($mysql_conn,$query);
	header ('location: cadastroColaboradores.php?id='.$form['idColaborador']);
}

} 	
	
?>