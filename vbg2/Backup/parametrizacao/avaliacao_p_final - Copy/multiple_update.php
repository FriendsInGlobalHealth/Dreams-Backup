<?php

//multiple_update.php

include('database_connection.php');

if(isset($_POST['hidden_id']))
{
 $data_avaliacao = $_POST['data_avaliacao'];
 $nome_avaliacao_padrao = $_POST['nome_avaliacao_padrao'];
 $resultado = $_POST['resultado'];
 $Avaliacao_id = $_POST['Avaliacao_id'];
 $Meio_Verificacao_id = $_POST['Meio_Verificacao_id'];
 $id = $_POST['hidden_id'];
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':data_avaliacao'   => $data_avaliacao[$count],
   ':nome_avaliacao_padrao'  => $nome_avaliacao_padrao[$count],
   ':resultado'  => $resultado[$count],
   ':Avaliacao_id' => $Avaliacao_id[$count],
   ':Meio_Verificacao_id'   => $Meio_Verificacao_id[$count],
   ':id'   => $id[$count]
  );
  $query = "
  UPDATE sa_avaliacao_padrao 
  SET data_avaliacao = :data_avaliacao, nome_avaliacao_padrao = :nome_avaliacao_padrao, resultado = :resultado, Avaliacao_id = :Avaliacao_id, Meio_Verificacao_id = :Meio_Verificacao_id 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>