<?php
include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];



$dados = array();

$query = mysqli_query($mysql_conn, "SELECT * FROM produtos WHERE idProduto = $id");
$form = mysqli_fetch_assoc($query);

	$dado[] =  $form["idProduto"];
	$dado[] =  $form["descricao"];
	$dado[] =  $form["idCategoria"];
	$dado[] =  $form["idFornecedor"];
	$dado[] =  $form["qtdPorUnidade"];
	$dado[] =  $form["unidade"];
	$dado[] =  $form["codigoBarra"];
	$dado[] =  $form["aplicacao"];
	$dado[] =  $form["foto"];
    $dados[] = $dado;

		
$json_data = array(
	"draw" => intval(1),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval(count($dados)),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval(count($dados)), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($dados); 

?>	