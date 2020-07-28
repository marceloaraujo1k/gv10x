<?php
include '../opendb.php';
include_once('../func.php');

$idCliente = $_GET['id'];

$query = "DELETE FROM clientes WHERE idCliente = $idCliente";
mysqli_query($mysql_conn, $query);
mysqli_error($mysql_conn);
header ('location: clientes.php');

?>