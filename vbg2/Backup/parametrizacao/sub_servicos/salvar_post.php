<?php
	include_once("conexao.php");
	
	$nome_sub_servico = $_POST['nome_sub_servico'];
	$id_servico = $_POST['id_servico'];
	
	echo "nome_sub_servico: $nome_sub_servico <br>Id Sub Servico: $id_servico <br>";
	
	$result_post = "INSERT INTO sa_sub_servico (nome_sub_servico, servico_id) VALUES ('$nome_sub_servico', '$id_servico')";
	$resultado_post = mysqli_query($conn, $result_post);
	
	if(mysqli_affected_rows($conn) > 0){ 
		echo "Artigo salvo com sucesso";	
	}else{
		echo "Artigo não foi salvo com sucesso";	
	}