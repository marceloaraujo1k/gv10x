<?php

session_start();
include '../opendb.php';
include_once('../func.php');


$conn = $mysql_conn;

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'idCliente', 
	1 => 'nomeRazaoSocialCliente',
	2 => 'cpfCnpjCliente',
	3 => 'telefoneCliente',
	4 => 'idEmpresa'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT *,  (SELECT empresa FROM empresas WHERE idEmpresa=clientes.idEmpresa) as filial  FROM clientes";
$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT *,  (SELECT empresa FROM empresas WHERE idEmpresa=clientes.idEmpresa) as filial  FROM clientes WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( idCliente LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR nomeRazaoSocialCliente LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR telefoneCliente LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR idempresa LIKE '".$requestData['search']['value']."%' )";
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
	$dado[] = $row_usuarios["idCliente"];
	$dado[] = utf8_encode($row_usuarios["nomeRazaoSocialCliente"]); // USAR A FUNÇÃO UTF8_ENCODE PARA RESOLVER O PROBLEMA DE ACENTUAÇÃO QUE ESTAVA PREJUDICANDO O JSON
	$dado[] = $row_usuarios["cpfCnpjCliente"];
	$dado[] = $row_usuarios["telefoneCliente"];	
	$dado[] = utf8_encode($row_usuarios["filial"]);	
	$dado[] = '<button  type="button" id="btnVisualizar" class="btn btn-primary" data-id="'.$row_usuarios["idCliente"].'"><i class="fas fa-eye">&nbsp;</i> Visualizar </button>';
	$dado [] = '<button type="button" id="btnEditar" class="btn btn btn-primary" data-id="'.$row_usuarios["idCliente"].'"><i class="fa fa-pen">&nbsp;</i> Editar </button>';
	$dado [] = '<button type="button" id="btnExcluir" class="btn btn btn-danger" data-id="'.$row_usuarios["idCliente"].'"><i class="fa fa-trash trash">&nbsp;</i> Excluir </button>';
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








           