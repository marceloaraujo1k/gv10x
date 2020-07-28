<?php
include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];



$dados = array();

$query = mysqli_query($mysql_conn, "SELECT *, (SELECT descricaoTipoFornecedor FROM tipofornecedor where tipofornecedor.idTipoFornecedor = fornecedores.idTipoFornecedor) as tipoFornecedor FROM fornecedores WHERE idFornecedor = $id");
$form = mysqli_fetch_assoc($query);

	$dado[]=$form["idFornecedor"];
	$dado[]=$form["razaoSocialFornecedor"];
	$dado[]=$form["nomeFantasiaFornecedor"];
    $dado[]=$form["cnpjCPFFornecedor"];
    $dado[]=$form["inscEstadualFornecedor"];
    $dado[]=$form["inscMunicipalFornecedor"];
    $dado[]=$form["enderecoFornecedor"];
    $dado[]=$form["numeroFornecedor"];
    $dado[]=$form["bairroFornecedor"];   
    $dado[]=$form["complementoFornecedor"];   
    $dado[]=$form["municipioFornecedor"];
    $dado[]=$form["cepFornecedor"];
    $dado[]=$form["ufFornecedor"];
    $dado[]=$form["telefoneFornecedor"];
    $dado[]=$form["emailFornecedor"];
 	$dado[]=$form["contatoFornecedor"];
	$dado[]=$form["idTipoFornecedor"];
	$dado[]=$form["observacaoFornecedor"];

    $dados[] = $dado;

		
$json_data = array(
	"draw" => intval(1),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval(count($dados)),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval(count($dados)), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($dados); 

?>	