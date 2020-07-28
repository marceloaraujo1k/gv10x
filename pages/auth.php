<?php
include 'opendb.php';
// session_start inicia a sessão
session_start();

print_r($_POST);

$user 		= $_POST["email"];	
$password 	= $_POST["password"];
$idEmpresa 	= $_POST["idEmpresa"];

// goes back to login page if no data were found
if (($user=='') || ($password=='')) 
{
 	header('location: login.php');
}
else if ($user && $password)
{
	// verify if the user and password are corrects
	$queryUser = mysqli_query($mysql_conn,"SELECT * FROM colaboradores WHERE email='$user' AND senha='$password' AND idEmpresa='$idEmpresa'");
	
	// if the data is correct, proceed	
	if (mysqli_num_rows($queryUser) > 0) 

	{
		$auth = mysqli_fetch_array($queryUser);
		$_SESSION['user'] = $auth['nome'];
		$_SESSION['idEmpresa'] = $auth['idEmpresa'];
	
		mysqli_free_result($queryUser);
	 	header('location: ./gerencial/dashboard.php' );
	}
	else
		{
		unset ($_SESSION['user']);
		unset ($_SESSION['password']);
		unset ($_SESSION['idEmpresa']);
	 	header('location: login.php');	
	
	}	
}
 
?>