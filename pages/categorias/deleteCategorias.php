<?php

include '../opendb.php';
include_once('../func.php');

$id = $_GET["id"];
    mysqli_query($mysql_conn, "DELETE FROM categorias WHERE idCategoria='$id'");
   header ('location: categorias.php');
?>