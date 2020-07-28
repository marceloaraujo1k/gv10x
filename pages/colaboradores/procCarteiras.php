<?php

session_start();
include '../opendb.php';
include_once('../func.php');


$conn = $mysql_conn;

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//$idColaborador = $_GET['id'];

//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'idCarteira', 
	1 => 'nomeRazaoSocialCliente',
	2 => 'cpfCnpjCliente',
	3 => 'tipoCliente',
	4 => 'grupoCliente'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "select a.*, c.nomeRazaoSocialCliente, c.nomeFantasiaCliente, c.cpfCnpjCliente from carteiras a
inner join clientes c on a.idCliente = c.idCliente where idColaborador='".$requestData['idColaborador']."' ;";

$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "select a.*, c.nomeRazaoSocialCliente, c.nomeFantasiaCliente, c.cpfCnpjCliente from carteiras a
inner join clientes c on a.idCliente = c.idCliente WHERE idColaborador='".$requestData['idColaborador']."' AND 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( idCarteira LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR nomeRazaoSocialCliente LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR nomeFantasiaCliente LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR cpfCnpjCliente LIKE '".$requestData['search']['value']."%' )";
}
$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);

//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);
// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["idCarteira"];
	$dado[] = $row_usuarios["nomeRazaoSocialCliente"]; // USAR A FUNÇÃO UTF8_ENCODE PARA RESOLVER O PROBLEMA DE ACENTUAÇÃO QUE ESTAVA PREJUDICANDO O JSON
	$dado[] = $row_usuarios["nomeFantasiaCliente"]; // USAR A FUNÇÃO UTF8_ENCODE PARA RESOLVER O PROBLEMA DE ACENTUAÇÃO QUE ESTAVA PREJUDICANDO O JSON
	$dado[] = $row_usuarios["cpfCnpjCliente"];
	$dado [] = '<button type="button" id="btnMigrarCarteira" class="btn btn btn-primary" data-id="'.$row_usuarios["idCarteira"].'"><i class="fa fa-pen">&nbsp;</i> Migrar </button>';
	$dado [] = '<button type="button" id="btnExcluir" class="btn btn btn-danger" data-id="'.$row_usuarios["idCarteira"].'"><i class="fa fa-trash trash">&nbsp;</i> Excluir </button>';
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








           