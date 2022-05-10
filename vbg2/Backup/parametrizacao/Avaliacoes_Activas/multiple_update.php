<?php

//multiple_update.php
include_once("conexao.php");
include('database_connection.php');

if(isset($_POST['hidden_id']))
{
 $data_avaliacao = $_POST['data_avaliacao'];
 $nome_avaliacao = $_POST['nome_avaliacao'];
 $instancia_id = $_POST['instancia_id'];
 $tipo_avaliacao_id = $_POST['tipo_avaliacao_id'];
 $estado = $_POST['estado'];
 $data_fim_avaliacao = $_POST['data_fim_avaliacao'];
 $id = $_POST['hidden_id'];
 
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':data_avaliacao'=> $data_avaliacao[$count],
   ':nome_avaliacao'=> $nome_avaliacao[$count],
   ':instancia_id'=> $instancia_id[$count],
   ':tipo_avaliacao_id'=> $tipo_avaliacao_id[$count],
   ':estado'=> $estado[$count],   
   ':data_fim_avaliacao'=> $data_fim_avaliacao[$count],
   ':id'=> $id[$count]
  );
  $query = "
  UPDATE sa_avaliacao1 
  SET data_avaliacao = :data_avaliacao, nome_avaliacao = :nome_avaliacao, instancia_id = :instancia_id, tipo_avaliacao_id = :tipo_avaliacao_id, estado = :estado,data_fim_avaliacao = :data_fim_avaliacao WHERE id = :id";
  
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>