<?php 

include '../opendb.php';
include_once('../func.php');
$conn = $mysql_conn;


$response=null;
if(isset($_POST['searchCliente'])){
    $searchCliente = $_POST['searchCliente'];
    $query = "select *, (select descricao from tipocliente where tipocliente.idTipoCliente = clientes.idTipoCliente) as tipoCliente,
     (select descricaoGrupoCliente from grupocliente where grupocliente.idGrupoCliente = clientes.idGrupoCliente) as grupoCliente
     from clientes where (nomeFantasiaCliente like '%".$searchCliente."%' or nomeRazaoSocialCliente like '%".$searchCliente."%') ";


    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result) ){
       $response[] = array("label"=>$row['nomeFantasiaCliente'] .'/'. $row['nomeRazaoSocialCliente'],  "idCliente"=>$row['idCliente'], "value"=>$row['cpfCnpjCliente'], "tipoCliente"=>$row['tipoCliente'], "grupoCliente"=>$row['grupoCliente']);
    }

    echo json_encode($response);
}


$response=null;
if(isset($_POST['searchCpfCnpj'])){
    $searchCpfCnpj = $_POST['searchCpfCnpj'];
    $query = "select *, (select descricao from tipocliente where tipocliente.idTipoCliente = clientes.idTipoCliente) as tipoCliente,
     (select descricaoGrupoCliente from grupocliente where grupocliente.idGrupoCliente = clientes.idGrupoCliente) as grupoCliente
     from clientes where (cpfCnpjCliente like '%".$searchCpfCnpj."%') ";


    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result) ){
       $response[] = array("label"=>$row['cpfCnpjCliente'],  "idCliente"=>$row['idCliente'], "value"=>$row['nomeFantasiaCliente'] .'/'. $row['nomeRazaoSocialCliente'], "tipoCliente"=>$row['tipoCliente'], "grupoCliente"=>$row['grupoCliente']);
    }

    echo json_encode($response);
}




exit;
