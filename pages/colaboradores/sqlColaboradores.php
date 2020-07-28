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
	
print_r($form);

if (empty ($form["id"])){	
	$query	= "INSERT INTO colaboradores 
	(idColaborador,
	idEmpresa,
	nome,
	sexo,
	dataNascimento,
	conselho,
	pis,
	cpf,
	rg,
	emissor,
	dataEmissao,
	cep,
	endereco,
	numero,
	complemento,
	bairro,
	uf,
	cidade,
	telefone,
	numeroCelular,
	radio,
	cargo,
	email,
	senha,
	idFuncao,
	observacao,
	dataAdmissao,
	salarioInicial,
	salarioAtual,
	convenioColaborador,
	convenioFamilia,
	convenioOdonto,
	vrDia,
	vtDia,
	exameAdmissional,
	examePeriodico,
	dataDemissao)
	VALUES
	(null,
	'$_SESSION[idEmpresa]',
	'$form[nome]',
	'$form[sexo]',
	'$form[dataNascimento]',
	'$form[conselho]',
	'$form[pis]',
	'$form[cpf]',
	'$form[rg]',
	'$form[emissor]',
	'$form[dataEmissao]',
	'$form[cep]',
	'$form[endereco]',
	'$form[numero]',
	'$form[complemento]',
	'$form[bairro]',
	'$form[uf]',
	'$form[cidade]',
	'$form[telefone]',
	'$form[numeroCelular]',
	'$form[radio]',
	'$form[cargo]',
	'$form[email]',
	'$form[senha]',
	'$form[idFuncao]',
	'$form[observacao]',
 	'$form[dataAdmissao]',
	REPLACE('$form[salarioInicial]', ',', '.'),
	REPLACE('$form[salarioAtual]', ',', '.'),
	REPLACE('$form[convenioColaborador]', ',', '.'),
	REPLACE('$form[convenioFamilia]', ',', '.'),
	REPLACE('$form[convenioOdonto]', ',', '.'),
	REPLACE('$form[vrDia]', ',', '.'),
	REPLACE('$form[vtDia]', ',', '.'),
	'$form[exameAdmissional]',
	'$form[examePeriodico]',
	'$form[dataDemissao]')";
	mysqli_query($mysql_conn,$query);
	$lastid=mysqli_insert_id($mysql_conn);
	header ('location: cadastroColaboradores.php?id='.$lastid);
}

else {
	if(!empty($form["id"])) {
 	$query	= "UPDATE colaboradores SET 
	idEmpresa = '$_SESSION[idEmpresa]',
	nome = '$form[nome]',
	sexo = '$form[sexo]',
	dataNascimento = '$form[dataNascimento]',
	conselho = '$form[conselho]',
	pis = '$form[pis]',
	cpf = '$form[cpf]',
	rg = '$form[rg]',
	emissor = '$form[emissor]',
	dataEmissao = '$form[dataEmissao]',
	cep = '$form[cep]',
	endereco = '$form[endereco]',
	numero = '$form[numero]',
	complemento = '$form[complemento]',
	bairro = '$form[bairro]',
	uf = '$form[uf]',
	cidade = '$form[cidade]',
	telefone = '$form[telefone]',
	numeroCelular = '$form[numeroCelular]',
	radio = '$form[radio]',
	cargo = '$form[cargo]',
	email = '$form[email]',
	senha = '$form[senha]',
	idFuncao = '$form[idFuncao]',
	observacao = '$form[observacao]',
	dataAdmissao = '$form[dataAdmissao]',
	salarioInicial = REPLACE('$form[salarioInicial]', ',', '.'),
	salarioAtual = REPLACE('$form[salarioAtual]', ',', '.'),
	convenioColaborador = REPLACE('$form[convenioColaborador]', ',', '.'),
	convenioFamilia = REPLACE('$form[convenioFamilia]', ',', '.'),
	convenioOdonto = REPLACE('$form[convenioOdonto]', ',', '.'),
	vrDia = REPLACE('$form[vrDia]', ',', '.'),
	vtDia = REPLACE('$form[vtDia]', ',', '.'),
	exameAdmissional = '$form[exameAdmissional]',
	examePeriodico = '$form[examePeriodico]',
	dataDemissao = '$form[dataDemissao]'
	WHERE idColaborador='$form[id]'";

	mysqli_query($mysql_conn,$query);
	header('location: cadastroColaboradores.php?id='.$form["id"]);
	}
}	
	
?>


