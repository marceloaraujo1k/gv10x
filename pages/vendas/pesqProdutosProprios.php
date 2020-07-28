<?php 

include '../opendb.php';
include_once('../func.php');
$conn = $mysql_conn;


$response=null;
if(isset($_POST['searchProduto'])){
    $searchproduto = $_POST['searchProduto'];

    
	$query = "select * from produtos where idFornecedor = 1 AND descricao like'%".$searchproduto."%'";


    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result) ){
       $response[] = array("label"=>$row['descricao'], "value"=>$row['idProduto']);
    }

    echo json_encode($response);
}

exit;
