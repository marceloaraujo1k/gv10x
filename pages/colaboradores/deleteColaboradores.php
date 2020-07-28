<?php
include '../opendb.php';
include_once('../func.php');

$id = $_GET['id'];

$query = "DELETE FROM colaboradores WHERE idColaborador = $id";
mysqli_query($mysql_conn, $query);
mysqli_error($mysql_conn);
header ('location: colaboradores.php');

?>