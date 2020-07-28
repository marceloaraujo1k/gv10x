<?php
include '../opendb.php';
include_once('../func.php');


$id = $_GET['id'];
$idColaborador = $_GET['idColaborador'];
$query = "DELETE FROM carteiras WHERE idCarteira = $id";
mysqli_query($mysql_conn, $query);
mysqli_error($mysql_conn);
header ('location: cadastroColaboradores.php?id='.$idColaborador);
?>