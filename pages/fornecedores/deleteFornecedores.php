<?php

include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];
    mysqli_query($mysql_conn, "DELETE FROM fornecedores WHERE idFornecedor='$id'");
   header ('location: fornecedores.php');
?>