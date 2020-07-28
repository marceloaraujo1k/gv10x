<?php
include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];



$dados = array();

//$query = mysqli_query($mysql_conn, "SELECT *, ( FROM clientes AS a INNER JOIN tipocliente AS b ON a.idTipoCliente = b.idTipoCliente WHERE idCliente =$id");
$query = mysqli_query($mysql_conn, "SELECT * FROM clientes WHERE idCliente =$id");

$form = mysqli_fetch_assoc($query);

	$dado[]=$form["idCliente"];
	$dado[]=$form["nomeRazaoSocialCliente"];
	$dado[]=$form["nomeFantasiaCliente"];
    $dado[]=$form["cpfCnpjCliente"];
    $dado[]=$form["tipoCliente"];
    $dado[]=$form["inscEstadual"];
    $dado[]=$form["inscMunicipal"];
    $dado[]=$form["emailCliente"];
    $dado[]=$form["enderecoCliente"];
    $dado[]=$form["numeroCasaCliente"];
    $dado[]=$form["bairroCliente"];
    $dado[]=$form["cepCliente"];
    $dado[]=$form["telefoneCliente"];
    $dado[]=$form["celularCliente"];
    $dado[]=$form["ufCliente"];
    $dado[]=$form["municipioCliente"];
    $dado[]=$form["contatoCliente"];
    $dado[]=$form["dataNascimentoCliente"];
    $dado[]=$form["observacaoCliente"];
    $dado[]=$form["idTipoCliente"];
    $dado[]=$form["idGrupoCliente"];


$dados[] = $dado;

		
$json_data = array(
	"draw" => intval(1),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval(count($dados)),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval(count($dados)), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($dados); 

?>	