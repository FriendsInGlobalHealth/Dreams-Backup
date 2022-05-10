<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "vbg_sam");
if(isset($_POST["nome_tipo_avaliacao"]))
{
 $nome_tipo_avaliacao = $_POST["nome_tipo_avaliacao"];
 $query = '';
 for($count = 0; $count<count($nome_tipo_avaliacao); $count++)
 {
  $nome_tipo_avaliacao_clean = mysqli_real_escape_string($connect, $nome_tipo_avaliacao[$count]);
  if($nome_tipo_avaliacao_clean != '')
  {
   $query .= '
   INSERT INTO sa_tipo_avaliacao(nome_tipo_avaliacao) 
   VALUES("'.$nome_tipo_avaliacao_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>

