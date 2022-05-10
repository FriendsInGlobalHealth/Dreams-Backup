<?php

//multiple_update.php

include('database_connection.php');

if(isset($_POST['hidden_id']))
{
 $nome_area = $_POST['nome_area'];
 $nome_area_padrao = $_POST['nome_area_padrao'];
 $nome_criterio = $_POST['nome_criterio'];
 $nome_meio_verificacao = $_POST['nome_meio_verificacao'];
 $resposta = $_POST['resposta'];
 $comentario = $_POST['comentario'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':nome_area'=> $nome_area[$count],
   ':nome_area_padrao'=> $nome_area_padrao[$count],
   ':nome_criterio'=> $nome_criterio[$count],
   ':nome_meio_verificacao'=> $nome_meio_verificacao[$count],
   ':resposta'=> $resposta[$count],   
   ':comentario'=> $comentario[$count],
   ':id'=> $id[$count]
  );
  $query = "
  UPDATE sa_avaliacao_area_padrao 
  SET nome_area = :nome_area, 
  nome_area_padrao = :nome_area_padrao, 
  nome_criterio = :nome_criterio, 
  nome_meio_verificacao = :nome_meio_verificacao, 
  resposta = :resposta, 
  comentario = :comentario   
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>