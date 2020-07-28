<?php

include '../opendb.php';
include_once('../func.php');
	
header('Content-Type: image/jpeg');


	$uploaddir = '../documentos/img_produtos/';

	$uploadfilename = $_FILES['anexo1']['name'];
	
	$uploadfile = $uploaddir . $uploadfilename;

	$arquivo = $uploadfile;
    
	$extensao = strtolower(substr(strrchr($arquivo,"."),1));
	
	$tempFile = $_FILES['anexo1']['tmp_name'];

	if($extensao  == "jpg"){

	$new_width = 200;
	$new_height = 200;
	list($width, $height) = getimagesize($tempFile);
	$image_p = imagecreatetruecolor($new_width, $new_height);
	
	$image = imagecreatefromjpeg($tempFile);

	 $resultImage = imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	if (move_uploaded_file(imagejpeg($image_p, $uploadfile ))){
		
		echo "Arquivo Enviado";
		}
		
	else {
		echo "Arquivo não enviado";
	}

}else if($extensao  == "png"){
	$new_width = 200;
	$new_height = 200;
	list($width, $height) = getimagesize($tempFile);
	$image_p = imagecreatetruecolor($new_width, $new_height);
	
	$image = imagecreatefrompng($tempFile);

	 $resultImage = imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	if (move_uploaded_file(imagepng($image_p, $uploadfile ))){
		
		echo "Arquivo Enviado";
		}
		
	else {
		echo "Arquivo não enviado";
	}
}
	
$form = $_POST;	 
	

if (empty ($form["id"])){	
	$query	= "INSERT INTO produtos (idFornecedor,
	idCategoria,
	descricao,
	codigoBarra,
	unidade,
	qtdPorUnidade,
	aplicacao,
	foto)
	VALUES ('$form[idFornecedor]',
	'$form[idCategoria]',
	'$form[descricao]',
	'$form[codigoBarra]',
	'$form[unidade]',
	'$form[qtdPorUnidade]',
	'$form[aplicacao]',
	'$uploadfile')";
	mysqli_query($mysql_conn,$query);
    header ('location: produtos.php');
}

else {
	if( (!empty($form["id"])) && (!empty($uploadfilename)) ) {
	//Excluir antiga imagem
	$query	= "SELECT foto FROM  produtos WHERE idProduto='$form[id]'";
	$result = mysqli_query($mysql_conn,$query);
	$row = mysqli_fetch_array($result);
	unlink($row['foto']);
	
	//Atualiza informações incluindo a foto caso seja selecionada
	$query	= "UPDATE produtos SET idFornecedor='$form[idFornecedor]',
	idCategoria = '$form[idCategoria]',
	descricao = '$form[descricao]',
	codigoBarra = '$form[codigoBarra]',
	unidade = '$form[unidade]',
	qtdPorUnidade ='$form[qtdPorUnidade]',
	aplicacao = '$form[aplicacao]',
	foto = '$uploadfile'
	WHERE 
	idProduto='$form[id]'";	
 	mysqli_query($mysql_conn,$query);
 	header('location: produtos.php' );
	}
	else {
		$query	= "UPDATE produtos SET idFornecedor='$form[idFornecedor]',
		idCategoria = '$form[idCategoria]',
		descricao = '$form[descricao]',
		codigoBarra = '$form[codigoBarra]',
		unidade = '$form[unidade]',
		qtdPorUnidade ='$form[qtdPorUnidade]',
		aplicacao = '$form[aplicacao]'
	 	WHERE 
		idProduto='$form[id]'";	
		mysqli_query($mysql_conn,$query);
		header('location: produtos.php' );
	}
}	
	
?>