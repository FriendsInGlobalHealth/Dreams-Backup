<?php
	include_once("conexao.php");
	
	$resultado = $_POST['resultado'];
	$criterio_verificacao = $_POST['criterio_verificacao'];
	$Meio_Verificacao_id = $_POST['Meio_Verificacao_id'];
	
	echo "Resultado: $localidade <br>Criterio de Verificacao: $criterio_verificacao <br> Meio de Verificacao: $Meio_Verificacao_id <br>";
	
	$result_post = "INSERT INTO sa_localidade (nome_localidade, distrito_id,provincia_id) VALUES ('$localidade', '$id_distrito', '$id_provincia')";
	$resultado_post = mysqli_query($conn, $result_post);
	
	if(mysqli_affected_rows($conn) > 0){ 
		echo "Artigo salvo com sucesso";	
	}else{
		echo "Artigo não foi salvo com sucesso";	
	}