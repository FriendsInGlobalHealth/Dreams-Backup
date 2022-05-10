<?php

//multiple_update.php
include_once("conexao.php");
include('database_connection.php');

/*
 $nome_area = $_POST['nome_area'];
 $nome_area_padrao = $_POST['nome_area_padrao'];
 $nome_criterio = $_POST['nome_criterio'];
 $nome_meio_verificacao = $_POST['nome_meio_verificacao'];
 $resposta = $_POST['resposta'];
 $comentario = $_POST['comentario'];
  
  $result_post = "INSERT INTO sa_avaliacao_area_padrao (nome_area, nome_area_padrao,nome_criterio,nome_meio_verificacao,resposta,comentario) 
  VALUES ('$nome_area', '$nome_area_padrao', '$nome_criterio','$nome_meio_verificacao', '$resposta','$comentario')";
  
 $resultado_post = mysqli_query($conn, $result_post);	
	
	if(mysqli_affected_rows($conn) > 0){ 
		echo "Artigo salvo com sucesso";	
	}else{
		echo "Artigo não foi salvo com sucesso";	
	} 
*/

if(isset($_POST['hidden_id']))
{
 $data_avaliacao = $_POST['data_avaliacao'];
 $nome_avaliacao = $_POST['nome_avaliacao'];
 $instancia_id = $_POST['instancia_id'];
 $tipo_avaliacao_id = $_POST['tipo_avaliacao_id'];
 $estado = $_POST['estado'];
 $data_fim_avaliacao = $_POST['data_fim_avaliacao'];
 $id_a = $_POST['hidden_id'];
 
 
 for($count = 0; $count < count($id_a); $count++)
 {
  $data = array(
   ':data_avaliacao'=> $data_avaliacao[$count],
   ':nome_avaliacao'=> $nome_avaliacao[$count],
   ':instancia_id'=> $instancia_id[$count],
   ':tipo_avaliacao_id'=> $tipo_avaliacao_id[$count],
   ':estado'=> $estado[$count],   
   ':data_fim_avaliacao'=> $data_fim_avaliacao[$count],
   ':id_a'=> $id_a[$count]
  );
  $query = "UPDATE sa_avaliacao SET data_avaliacao = :data_avaliacao, nome_avaliacao = :nome_avaliacao, instancia_id = :instancia_id, tipo_avaliacao_id = :tipo_avaliacao_id, estado = :estado,data_fim_avaliacao = :data_fim_avaliacao WHERE id_a = :id_a";
  
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>

<?php

/*
  UPDATE sa_avaliacao_area_padrao 
  SET nome_area = :nome_area, 
  nome_area_padrao = :nome_area_padrao, 
  nome_criterio = :nome_criterio, 
  nome_meio_verificacao = :nome_meio_verificacao, 
  resposta = :resposta, 
  comentario = :comentario   
  WHERE id = :id
  ";
*/

?>