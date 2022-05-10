<?php
	include_once("conexao.php");
	
	$data_avaliacao = $_POST['data_avaliacao'];
	$nome_avaliacao = $_POST['nome_avaliacao'];
	$id_instancia = $_POST['id_instancia'];
	$id_tipo_avaliacao = $_POST['id_tipo_avaliacao'];
	$data_fim_avaliacao = $_POST['data_fim_avaliacao'];
	
	
	echo "data_avaliacao: $data_avaliacao <br>Id nome_avaliacao: $nome_avaliacao <br> Id id_instancia: $id_instancia <br>";
	echo "id_tipo_avaliacao: $id_tipo_avaliacao <br>Id data_fim_avaliacao: $data_fim_avaliacao <br>";
	
	$result_post = "INSERT INTO sa_avaliacao (data_avaliacao, nome_avaliacao,instancia_id, tipo_avaliacao_id,data_fim_avaliacao) 
	VALUES ('$data_avaliacao', '$nome_avaliacao', '$id_instancia', '$id_tipo_avaliacao', '$data_fim_avaliacao')";
	$resultado_post = mysqli_query($conn, $result_post);
	
	if(mysqli_affected_rows($conn) > 0){ 
		echo "Artigo salvo com sucesso";	
	}else{
		echo "Artigo não foi salvo com sucesso";	
	}