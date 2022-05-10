<?php
	include_once("conexao.php");
	
	$nome_meio_verificacao = $_POST['nome_meio_verificacao'];
	$id_area_padrao = $_POST['id_area_padrao'];
	$id_criterio_verificacao = $_POST['id_criterio_verificacao'];
	$id_area = $_POST['id_area'];
	
	//comando que faz insert
	echo "nome_meio_verificacao: $nome_meio_verificacao <br> Id area: $id_area <br>Id id_area_padrao: $id_area_padrao <br> Id Criterio: $id_criterio_verificacao  <br>";
	$result_post = "INSERT INTO sa_meio_verificacao (nome_meio_verificacao, criterio_verificacao_id,area_padrao_id,area_id) VALUES ('$nome_meio_verificacao', 
	'$id_criterio_verificacao', '$id_area_padrao','$id_area')";
	
	//comando que faz update do criterio de verificacao
	$result_post2 = "UPDATE sa_meio_verificacao mv
	INNER JOIN sa_criterio_verificacao cv
	on mv.criterio_verificacao_id=cv.id
	SET 
	mv.nome_criterio = cv.nome_criterio
	Where mv.nome_criterio IS NULL";
	
	//comando que faz update da area padrao 
	$result_post3 = "UPDATE sa_meio_verificacao mv
	INNER JOIN  sa_area_padrao ap
	on mv.area_padrao_id=ap.id
	SET 
	mv.nome_area_padrao = ap.nome_area_padrao
	Where mv.nome_area_padrao IS NULL";

	//comando que faz update da area 
	$result_post4 = "UPDATE sa_meio_verificacao mv
	INNER JOIN  sa_area ar
	on mv.area_id=ar.id
	SET 
	mv.nome_area = ar.nome_area
	Where mv.nome_area IS NULL";		

	
	$resultado_post = mysqli_query($conn, $result_post);
	$resultado_post2 = mysqli_query($conn, $result_post2);
	$resultado_post3 = mysqli_query($conn, $result_post3);
	$resultado_post4 = mysqli_query($conn, $result_post4);	
	
	if(mysqli_affected_rows($conn) > 0){ 
		echo "Artigo salvo com sucesso";	
	}else{
		echo "Artigo não foi salvo com sucesso";	
	}