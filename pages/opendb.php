<?php
header('Content-Type: text/html; charset=utf-8');
$hostname = 'localhost';
$username = 'root';
$password = '';

// conection with  database
$mysql_conn	= mysqli_connect($hostname, $username, $password, 'gv10x');

if($mysql_conn == FALSE)
{
	echo("Unable to establish connection with the mysql server");
	exit;
}
	
?>