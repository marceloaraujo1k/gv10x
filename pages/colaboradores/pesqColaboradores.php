<?php 

include '../opendb.php';
include_once('../func.php');
$conn = $mysql_conn;


$response=null;
if(isset($_POST['searchNomeColaborador'])){
    $searchNomeColaborador = $_POST['searchNomeColaborador'];
    $query = "select idColaborador, nome, cpf from colaboradores where nome like '%".$searchNomeColaborador."%' ";


    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result) ){
       $response[] = array("label"=>$row['nome'],  "value"=>$row['idColaborador']);
    }

    echo json_encode($response);
}




exit;
