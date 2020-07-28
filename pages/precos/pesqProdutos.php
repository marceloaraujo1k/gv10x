<?php 

include '../opendb.php';
include_once('../func.php');
$conn = $mysql_conn;


$response=null;
if(isset($_POST['searchProduto'])){
    $searchproduto = $_POST['searchProduto'];
    $codigoBarra = $_POST['codigoBarra'];
    $idCategoria = $_POST['idCategoria'];
    $idFornecedor = $_POST['idFornecedor'];
    
	$query = "select * from produtos where (idCategoria = ".$idCategoria." AND idFornecedor = ".$idFornecedor.") AND (descricao like'%".$searchproduto."%' OR descricao like'%".$codigoBarra."%')";


    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result) ){
       $response[] = array("label"=>utf8_encode($row['descricao']), "value"=>$row['idProduto'], "codigoBarra"=>$row['codigoBarra'], "unidade"=>$row['unidade'], "qtdPorUnidade"=>$row['qtdPorUnidade']);
    }

    echo json_encode($response);
}

exit;
