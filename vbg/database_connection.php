<?php
//database_connection.php

$connect = new PDO('mysql:host=localhost;dbname=vbg_sam', 'sysadmin', 'Server19!!!');

$mysqli=new mysqli('localhost','sysadmin','Server19!!!','vbg_sam');

$connect1 = mysqli_connect("localhost", "sysadmin", "Server19!!!", "vbg_sam");

session_start();

?>


<?php
//conexao1
	$servidor = "localhost";
	$usuario = "sysadmin";
	$senha = "Server19!!!";
	$dbname = "vbg_sam";
	
	//Criar a conexao
	$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	if(!$con){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	
?>

<?php
//conexao
	$servidor = "localhost";
	$usuario = "sysadmin";
	$senha = "Server19!!!";
	$dbname = "vbg_sam";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>