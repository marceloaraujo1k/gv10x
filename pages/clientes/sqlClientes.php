<?php

session_start();
if((!isset ($_SESSION['user']) == true) and (!isset ($_SESSION['idEmpresa']) == true))
{
  unset($_SESSION['user']);
  unset($_SESSION['idEmpresa']);
  session_destroy();
  header('location:../login.php');
  }
 
  
include '../opendb.php';
include_once('../func.php');

$form = $_POST;	 

if (empty ($form["id"])){	

$query	= "INSERT INTO clientes (idCliente,
idEmpresa,
idTipoCliente,
nomeRazaoSocialCliente,
nomeFantasiaCliente,
cpfCnpjCliente,
tipoCliente,
inscEstadual,
inscMunicipal,
emailCliente,
enderecoCliente,
numeroCasaCliente,
bairroCliente,
cepCliente,
telefoneCliente,
celularCliente,
ufCliente,
municipioCliente,
contatoCliente,
dataNascimentoCliente,
observacaoCliente,
idGrupoCliente) VALUES 
  (NULL,
    '$_SESSION[idEmpresa]',
    '$form[idTipoCliente]',
	  '$form[nomeRazaoSocialCliente]',
	  '$form[nomeFantasiaCliente]',
    '$form[cpfCnpjCliente]',
    '$form[tipoCliente]',
    '$form[inscEstadual]',
    '$form[inscMunicipal]',
    '$form[emailCliente]',
    '$form[enderecoCliente]',
    '$form[numeroCasaCliente]',
    '$form[bairroCliente]',
    '$form[cepCliente]',
    '$form[telefoneCliente]',
    '$form[celularCliente]',
    '$form[ufCliente]',
    '$form[municipioCliente]',
    '$form[contatoCliente]',
    '$form[dataNascimentoCliente]',
    '$form[observacaoCliente]',
    '$form[idGrupoCliente]')";
  
  	mysqli_query($mysql_conn,$query);
    header ('location: clientes.php');
}

else {
	if(!empty($form["id"])) {
  $query	= "UPDATE clientes SET 
  idEmpresa ='$_SESSION[idEmpresa]',
  idTipoCliente = '$form[idTipoCliente]',
  nomeRazaoSocialCliente = '$form[nomeRazaoSocialCliente]',
	nomeFantasiaCliente = '$form[nomeFantasiaCliente]',
  cpfCnpjCliente = '$form[cpfCnpjCliente]',
  tipoCliente = '$form[tipoCliente]',
  inscEstadual = '$form[inscEstadual]',
  inscMunicipal = '$form[inscMunicipal]',
  emailCliente = '$form[emailCliente]',
  enderecoCliente = '$form[enderecoCliente]',
  numeroCasaCliente = '$form[numeroCasaCliente]',
  bairroCliente = '$form[bairroCliente]',
  cepCliente = '$form[cepCliente]',
  telefoneCliente = '$form[telefoneCliente]',
  celularCliente = '$form[celularCliente]',
  ufCliente = '$form[ufCliente]',
  municipioCliente = '$form[municipioCliente]',
  contatoCliente = '$form[contatoCliente]',
  dataNascimentoCliente = '$form[dataNascimentoCliente]',
  observacaoCliente = '$form[observacaoCliente]',
  idGrupoCliente = '$form[idGrupoCliente]'
	WHERE idCliente='$form[id]'";
 
  mysqli_query($mysql_conn,$query);
  header('location: clientes.php' );
	}
}	

?>