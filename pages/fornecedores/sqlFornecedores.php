<?php

include '../opendb.php';
include_once('../func.php');
	
	
$form = $_POST;	 
	

if (empty ($form["id"])){	
	$query	= "INSERT INTO fornecedores (idFornecedor,
	razaoSocialFornecedor,
	nomeFantasiaFornecedor,
	cnpjCPFFornecedor,
	inscEstadualFornecedor,
	inscMunicipalFornecedor,
	enderecoFornecedor,
	numeroFornecedor,
	bairroFornecedor,
	complementoFornecedor,
	municipioFornecedor,
	cepFornecedor,
	ufFornecedor,
	telefoneFornecedor,
	emailFornecedor,
	contatoFornecedor,
	idTipoFornecedor,
	observacaoFornecedor)
	VALUES
	(null,
	'$form[razaoSocialFornecedor]',
	'$form[nomeFantasiaFornecedor]',
    '$form[cnpjCPFFornecedor]',
    '$form[inscEstadualFornecedor]',
    '$form[inscMunicipalFornecedor]',
    '$form[enderecoFornecedor]',
    '$form[numeroFornecedor]',
    '$form[bairroFornecedor]',   
    '$form[complementoFornecedor]',   
    '$form[municipioFornecedor]',
    '$form[cepFornecedor]',
    '$form[ufFornecedor]',
    '$form[telefoneFornecedor]',
    '$form[emailFornecedor]',
 	'$form[contatoFornecedor]',
	'$form[idTipoFornecedor]',
	'$form[observacaoFornecedor]')";

	mysqli_query($mysql_conn,$query);
   	header ('location: fornecedores.php');
}

else {
	if(!empty($form["id"])) {
		print_r($form);
	$query	= "UPDATE fornecedores SET 
	razaoSocialFornecedor='$form[razaoSocialFornecedor]',
	nomeFantasiaFornecedor='$form[nomeFantasiaFornecedor]',
    cnpjCPFFornecedor='$form[cnpjCPFFornecedor]',
    inscEstadualFornecedor='$form[inscEstadualFornecedor]',
    inscMunicipalFornecedor='$form[inscMunicipalFornecedor]',
    enderecoFornecedor='$form[enderecoFornecedor]',
    numeroFornecedor='$form[numeroFornecedor]',
	bairroFornecedor='$form[bairroFornecedor]',   
    complementoFornecedor='$form[complementoFornecedor]',   
	municipioFornecedor='$form[municipioFornecedor]',
    cepFornecedor='$form[cepFornecedor]',
    ufFornecedor='$form[ufFornecedor]',
    telefoneFornecedor='$form[telefoneFornecedor]',
	emailFornecedor='$form[emailFornecedor]',
	contatoFornecedor='$form[contatoFornecedor]',
	idTipoFornecedor='$form[idTipoFornecedor]',
	observacaoFornecedor='$form[observacaoFornecedor]'
	WHERE idFornecedor='$form[id]'";	
	mysqli_query($mysql_conn,$query);
	header('location: fornecedores.php' );
	}
}	
	
?>