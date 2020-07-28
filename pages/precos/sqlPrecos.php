<?php

include '../opendb.php';
include_once('../func.php');
	
header('Content-Type: image/jpeg');


	$uploaddir = '../documentos/img_precos/';

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
	$query	= "INSERT INTO precos (idPreco,
	dataPreco,
	idCliente,
	idProduto,
	preco,
	tipoPreco,
	observacaoPreco,
	evidenciaPreco)
	VALUES (NULL,
	'$form[dataPreco]',
	'$form[idCliente]',
	'$form[idProduto]',
	REPLACE('$form[preco]', ',', '.'),
	'$form[tipoPreco]',
	'$form[observacaoPreco]',
	'$uploadfile')";
	mysqli_query($mysql_conn,$query);
    header ('location: precos.php');
}

else {
	if( (!empty($form["id"])) && (!empty($uploadfilename)) ) {
	//Excluir antiga imagem
	$query	= "SELECT evidenciaPreco FROM  precos WHERE idPreco='$form[id]'";
	$result = mysqli_query($mysql_conn,$query);
	$row = mysqli_fetch_array($result);
	unlink($row['evidenciaPreco']);
	
	//Atualiza informações incluindo a foto caso seja selecionada
	$query	= "UPDATE precos SET idPreco='$form[idPreco]',
	dataPreco = '$form[dataPreco]',
	idCliente = '$form[idCliente]',
	idProduto = '$form[idProduto]',
	preco = REPLACE('$form[preco]', ',', '.'),
	tipoPreco ='$form[tipoPreco]',
	observacaoPreco = '$form[observacaoPreco]',
	evidenciaPreco = '$uploadfile'
	WHERE 
	idPreco='$form[id]'";	
 	mysqli_query($mysql_conn,$query);
 	header('location: precos.php' );
	}
	else {
		$query	= "UPDATE precos SET idPreco='$form[idPreco]',
		dataPreco = '$form[dataPreco]',
		idCliente = '$form[idCliente]',
		idProduto = '$form[idProduto]',
		preco = REPLACE('$form[preco]', ',', '.'),
		tipoPreco ='$form[tipoPreco]',
		observacaoPreco = '$form[observacaoPreco]',
		WHERE 
		idPreco='$form[id]'";	
		 mysqli_query($mysql_conn,$query);
		 header('location: precos.php' );
	}
}	
	
?>