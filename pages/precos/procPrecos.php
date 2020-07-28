<?php

session_start();
include '../opendb.php';
include_once('../func.php');


$conn = $mysql_conn;

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;
//idconsultas, descricao, dataRecebimento, valor, valorRecebido, desconto, saldoDevedor, formaPagamento,statusPagamento

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT precos.*, produtos.descricao, produtos.aplicacao, produtos.qtdPorUnidade, produtos.unidade,
(SELECT nomeFantasiaCliente FROM clientes WHERE idCliente=precos.idCliente)  as nomeFantasiaCliente,
(SELECT nomeFantasiaFornecedor FROM fornecedores WHERE idFornecedor=produtos.idFornecedor)  as nomeFantasiaFornecedor,
(SELECT descricao FROM categorias WHERE idCategoria=produtos.idCategoria)  as descricaoCategoria          
FROM precos INNER JOIN produtos ON precos.idProduto=produtos.idProduto";

$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'idPreco', 
	1 => 'dataPreco',
	2 => 'idCliente',
	3 => 'descricaoCategoria',
	4 => 'nomeFantasiaFornecedor',
	5 => 'descricao',
	6 => 'preco',
	7 => 'evidenciaPreco'
);


//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT precos.*, produtos.descricao, produtos.aplicacao, produtos.qtdPorUnidade, produtos.unidade,
(SELECT nomeFantasiaCliente FROM clientes WHERE idCliente=precos.idCliente)  as nomeFantasiaCliente,
(SELECT nomeFantasiaFornecedor FROM fornecedores WHERE idFornecedor=produtos.idFornecedor)  as nomeFantasiaFornecedor,
(SELECT descricao FROM categorias WHERE idCategoria=produtos.idCategoria)  as descricaoCategoria          
FROM precos INNER JOIN produtos ON precos.idProduto=produtos.idProduto";
$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT precos.*, produtos.descricao, produtos.aplicacao, produtos.qtdPorUnidade, produtos.unidade,
(SELECT nomeFantasiaCliente FROM clientes WHERE idCliente=precos.idCliente)  as nomeFantasiaCliente,
(SELECT nomeFantasiaFornecedor FROM fornecedores WHERE idFornecedor=produtos.idFornecedor)  as nomeFantasiaFornecedor,
(SELECT descricao FROM categorias WHERE idCategoria=produtos.idCategoria)  as descricaoCategoria          
FROM precos INNER JOIN produtos ON precos.idProduto=produtos.idProduto WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( idProduto LIKE '".$requestData['search']['value']."%' ";  
	$result_usuarios.=" OR descricao LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR categoria LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR nomeFantasia LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR qtdPorUnidade LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR unidade LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR codigoBarra LIKE '".$requestData['search']['value']."%' ";

}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);

//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	
	$dado[] =  $row["idPreco"];
	$dado[] =  date('d/m/Y', strtotime($row["dataPreco"]));
	$dado[] =  $row["nomeFantasiaCliente"];
	$dado[] =  $row["descricaoCategoria"];
	$dado[] =  $row["nomeFantasiaFornecedor"];
	$dado[] =  $row["descricao"];
	$dado[] =  $row["unidade"];
	$dado[] =  $row["qtdPorUnidade"];
	$dado[] =  number_format($row["preco"],2,",",".");
	$dado[] =  $row["tipoPreco"];	
	$dado[] =  '<iframe class="embed-responsive-item" src="'.$row["evidenciaPreco"].'"allowfullscreen></iframe>';
	$dado[] =  $row["observacaoPreco"];
	$dado [] = '<button type="button" id="btnEditar" class="btn btn btn-primary" data-id="'.$row["idPreco"].'"><i class="fa fa-pen">&nbsp;</i> Editar</button>';
 	$dado [] = '<button type="button" id="btnExcluir" class="btn btn btn-danger" data-id="'.$row["idPreco"].'"><i class="fa fa-trash ">&nbsp;</i> Excluir </button>';
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json



?>








           