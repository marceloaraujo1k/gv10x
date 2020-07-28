<?php
//Colocar para que seja lida no tipo Texto, para caso queira conferir o Json Completo que está sendo puxado.
header("Content-Type: text/plain");

//Capturar CNPJ
$cnpj = $_REQUEST["cnpj"];
// Retira as barras, pontos e todos os outros caracteres que forem enviados para o PHP
$valor = preg_replace('/[^0-9]/', '', $cnpj); 
//Criando Comunicação cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/".$valor);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$retorno = curl_exec($ch);
curl_close($ch);

$retorno = json_decode($retorno); //Ajuda a ser lido mais rapidamente apenas. Nada de mais. Poderia ser feito sem isso. Apenas com o Json Encode
echo json_encode($retorno, JSON_PRETTY_PRINT);

?>